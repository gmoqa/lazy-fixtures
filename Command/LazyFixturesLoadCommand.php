<?php

namespace LazyFixturesBundle\Command;

use Faker\Factory;
use LazyFixturesBundle\Annotation\Field;
use LazyFixturesBundle\Annotation\Entity;
use LazyFixturesBundle\Annotation\Relation;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\Console\Input\InputInterface;
use App\Exceptions\LazyFixturesAnnotationException;
use Symfony\Component\Console\Output\OutputInterface;
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * Class LazyFixturesLoadCommand
 * @package LazyFixturesBundle\Command;
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
class LazyFixturesLoadCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'lazy:fixtures:load';

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var AnnotationReader
     */
    private $reader;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var \Doctrine\Common\Persistence\Mapping\ClassMetadata[]
     */
    private $metadata;

    /**
     * @var array
     */
    private $processedEntities = [];

    /**
     * @var array
     */
    private $dependenciesIds = [];

    /**
     * LazyFixturesLoadCommand constructor.
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create();
        $this->reader = new AnnotationReader();
        $this->metadata = $manager->getMetadataFactory()->getAllMetadata();
        parent::__construct();
    }
    
    protected function configure()
    {
        $this->setDescription('Add a short description for your command');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws LazyFixturesAnnotationException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->validateAnnotationsOrThrowException();
        $this->purgateDatabase();
        
        foreach ($this->metadata as $classMetadata) {
            $this->processReflectionClass($classMetadata->getReflectionClass());
        }
        
        $output->writeln('All your fixtures were executed');
    }

    /**
     * @param \ReflectionClass $reflectionClass
     */
    private function processReflectionClass(\ReflectionClass $reflectionClass)
    {
        if (in_array($reflectionClass->getName(), $this->processedEntities)) {
            return;
        }
        
        $entityAnnotation = $this->getEntityAnnotation($reflectionClass);
        
        if (!$entityAnnotation) {
            return;
        }
        
        if ($entityAnnotation->getDependencies()) {
            foreach ($entityAnnotation->getDependencies() as $dependency) {
                $dependencyClass = $this->getReflectionClassByString($dependency);
                $this->processReflectionClass($dependencyClass);
            }
        }
        
        for ($i = 1; $i <= $entityAnnotation->getQuantity(); $i++) {
            $entity = $reflectionClass->newInstance();
            foreach ($reflectionClass->getProperties() as $property) {
                $annotation = $this->getLazyFixtureAnnotationOrNull($property);
                if (!$annotation) {
                    continue;
                }
                switch ($annotation->getName()) {
                    case 'field':
                        $setterName = 'set'.ucwords($property->getName());
                        /** @var Field $annotation */
                        $fakerName = $annotation->getType();
                        $entity->$setterName($this->faker->$fakerName);
                        break;
                    case 'relation':
                        $setterName = 'set'.ucwords($property->getName());
                        $doctrineAnnotations = $this->getManyToOneAnnotation($property);
                        $relationEntity = $this->getRandomElement($doctrineAnnotations->targetEntity);
                        $entity->$setterName($relationEntity);
                        break;
                }
            }
            $this->manager->persist($entity);
            $this->manager->flush();
            $this->dependenciesIds[$reflectionClass->getName()][] = $entity->getId();
        }
        array_push($this->processedEntities, $reflectionClass->getName());
    }

    /**
     * @param \ReflectionClass $reflectionClass
     * @return Entity
     */
    private function getEntityAnnotation($reflectionClass)
    {
        return $this->reader->getClassAnnotation(
            $reflectionClass,
            Entity::class
        );
    }

    /**
     * @param $property
     * @return null|object
     */
    private function getManyToOneAnnotation($property)
    {
        return $this->reader->getPropertyAnnotation(
            $property,
            \Doctrine\ORM\Mapping\ManyToOne::class
        );
    }
    
    private function purgateDatabase()
    {
        $purger = new ORMPurger($this->manager);
        $purger->purge();
    }

    /**
     * @param string $entity
     * @return null|object
     */
    private function getRandomElement(string $entity)
    {
        $repository = $this->manager->getRepository($entity);
        $random = array_rand($this->dependenciesIds[$entity], 1);
        return $repository->find($this->dependenciesIds[$entity][$random]);
    }

    /**
     * @param $property
     * @return null|LazyFixtureAnnotation
     */
    private function getLazyFixtureAnnotationOrNull($property)
    {
        $annotation = $this->reader
            ->getPropertyAnnotation($property, Field::class);
        if (!$annotation) {
            $annotation = $this->reader
                ->getPropertyAnnotation($property, Relation::class);
        }
        return $annotation;
    }

    /**
     * @param $string
     * @return \ReflectionClass|null
     */
    private function getReflectionClassByString($string)
    {
        foreach ($this->metadata as $classMetadata) {
            $reflectionClass = $classMetadata->getReflectionClass();
            if ($reflectionClass->getShortName() === $string) {
                return $classMetadata->getReflectionClass();
            }
        }
        return null;
    }

    /**
     * @param $string
     * @return bool|null
     */
    private function hasValidEntityName($string)
    {
        foreach ($this->metadata as $classMetadata) {
            $reflectionClass = $classMetadata->getReflectionClass();
            if ($reflectionClass->getShortName() === $string) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws LazyFixturesAnnotationException
     */
    private function validateAnnotationsOrThrowException()
    {
        foreach ($this->metadata as $classMetadata) {
            $reflectionClass = $classMetadata->getReflectionClass();
            $entityAnnotation = $this->getEntityAnnotation($reflectionClass);
            if ($entityAnnotation) {
                if ($entityAnnotation->getQuantity() <= 0) {
                    throw LazyFixturesAnnotationException::invalidQuantity($reflectionClass->getName());
                }
                
                if ($entityAnnotation->hasDependencies()) {
                    foreach ($entityAnnotation->getDependencies() as $dependency) {
                        if (!$this->hasValidEntityName($dependency)) {
                            throw LazyFixturesAnnotationException::invalidDependencies($reflectionClass->getName());
                        }
                    }
                }

                foreach ($reflectionClass->getProperties() as $property) {
                    $annotation = $this->getLazyFixtureAnnotationOrNull($property);
                    if (!$annotation) {
                        continue;
                    }
                    switch ($annotation->getName()) {
                        case 'field':
                            /** @var Field $annotation */
                            $fakerName = $annotation->getType();
                            try {
                                $this->faker->$fakerName;
                            } catch (\Exception $e) {
                                throw LazyFixturesAnnotationException::invalidFieldType(
                                    $reflectionClass->getName(),
                                    $property->getName()
                                );
                            }
                            break;
                        case 'relation':
                            $doctrineAnnotations = $this->getManyToOneAnnotation($property);
                            if (!$doctrineAnnotations->targetEntity) {
                                throw LazyFixturesAnnotationException::invalidRelation($reflectionClass->getName());
                            }
                            break;
                    }
                }
            }
        }
    }
}
