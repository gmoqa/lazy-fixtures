<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Boolean extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'boolean';

    /**
     * @var string
     */
    const TYPE = 'field';
    
    /**
     * @var integer
     */
    public $chanceOfGettingTrue;
}