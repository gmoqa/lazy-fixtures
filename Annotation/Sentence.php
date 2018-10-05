<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Sentence extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Sentence';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $nbWords = 6;

    /**
     * @var bool
     */
    public $variableNbWords = true;
}
