<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class MonthName extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'MonthName';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $max;
}
