<?php

namespace LazyFixturesBundle\Annotation;

use Doctrine\ORM\Mapping\Annotation;
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
final class Relation implements Annotation, LazyFixtureAnnotation
{
    protected static $name = 'relation';
    
    /**
     * @return string
     */
    public function getName()
    {
        return self::$name;
    }
}
