<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class DateTimeBetween extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'DateTimeBetween';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string 
     */
    public $startDate = '-30 years';

    /**
     * @var string 
     */
    public $endDate = 'now';

    /**
     * @var null 
     */
    public $timezone = null;
}
