<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class NumberBetween extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'NumberBetween';

    /**
     * @var string
     */
    const TYPE = 'field';
    
    /**
     * @var int
     */
    public $min = 1000;

    /**
     * @var int
     */
    public $max = 9000;
}
