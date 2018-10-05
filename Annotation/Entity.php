<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("CLASS")
 */
final class Entity extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Entity';

    /**
     * @var string
     */
    const TYPE = 'entity';
    
    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var array
     */
    public $dependencies = [];
    
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
