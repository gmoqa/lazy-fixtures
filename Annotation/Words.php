<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Words extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Words';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int 
     */
    public $nb = 3;

    /**
     * @var bool 
     */
    public $asText = false;
}
