<?php

namespace LazyFixturesBundle\Annotation;

use Doctrine\ORM\Mapping\Annotation;
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
final class Field implements Annotation, LazyFixtureAnnotation
{
    protected static $name = 'field';
    
    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $options = [];

    /**
     * @return string
     */
    public function getName()
    {
        return self::$name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
