<?php

namespace LazyFixturesBundle\Annotation;

use Doctrine\ORM\Mapping\Annotation;
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("CLASS")
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
final class Entity implements Annotation, LazyFixtureAnnotation
{
    protected static $name = 'entity';
    
    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var array
     */
    public $dependencies = [];

    /**
     * @return string
     */
    public function getName()
    {
        return self::$name;
    }
    
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @return bool
     */
    public function hasDependencies()
    {
        if (empty($this->dependencies)) {
            return false;
        }
        
        return true;
    }
}
