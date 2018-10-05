<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Regexify extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Regexify';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string
     */
    public $string;
}
