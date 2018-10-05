<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class RandomFloat extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RandomFloat';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var null
     */
    public $nbMaxDecimals = NULL;

    /**
     * @var int
     */
    public $min = 0;

    /**
     * @var null
     */
    public $max = NULL;
}
