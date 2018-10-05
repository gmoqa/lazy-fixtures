<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class DateTimeThisCentury extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'DateTimeThisCentury';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $max = 'now';

    /**
     * @var null
     */
    public $timezone = null;
}
