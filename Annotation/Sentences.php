<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Sentences extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Sentences';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $nb = 3;
    
    /**
     * @var int
     */
    public $asText = false;
}
