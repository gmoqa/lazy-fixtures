<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Longitude extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Longitude';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $min;

    /**
     * @var int
     */
    public $max;
}
