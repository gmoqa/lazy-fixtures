<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class RealText extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RealText';

    /**
     * @var string
     */
    const TYPE = 'field';
    
    /**
     * @var int
     */
    public $maxNbChars = 200;

    /**
     * @var int
     */
    public $indexSize = 2;
}
