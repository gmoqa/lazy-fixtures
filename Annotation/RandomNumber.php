<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class RandomNumber extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RandomNumber';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var null|integer
     */
    public $nbDigits = NULL;

    /**
     * @var bool
     */
    public $strict = false;
}
