<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class RandomElements extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RandomElements';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var array
     */
    public $array;

    /**
     * @var int
     */
    public $count;
}
