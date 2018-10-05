<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Date extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Date';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $format;

    /**
     * @var string
     */
    public $max;
}
