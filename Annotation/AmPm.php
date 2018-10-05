<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class AmPm extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'AmPm';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string 
     */
    public $max = 'now';
}
