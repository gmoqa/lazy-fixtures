<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class DateTimeInInterval extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'DateTimeInInterval';

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
    public $interval = '+ 5 days';

    /**
     * @var null
     */
    public $timezone = null;
}
