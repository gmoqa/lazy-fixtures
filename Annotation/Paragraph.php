<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Paragraph extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Paragraph';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $nbSentences = 3;

    /**
     * @var bool
     */
    public $variableNbSentences = true;
}
