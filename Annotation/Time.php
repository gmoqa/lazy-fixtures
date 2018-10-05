<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Time extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Time';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $format = 'H:i:s';

    /**
     * @var string  
     */
    public $max = 'now';
}
