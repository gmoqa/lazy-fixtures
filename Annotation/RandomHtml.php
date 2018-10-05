<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class RandomHtml extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RandomHtml';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $a = 2;

    /**
     * @var int
     */
    public $b = 3;
}
