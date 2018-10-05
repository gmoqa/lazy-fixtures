<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class DayOfMonth extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'DayOfMonth';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $max = 'now';
}
