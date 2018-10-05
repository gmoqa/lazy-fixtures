<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Tld extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Tld';

    /**
     * @var string
     */
    const TYPE = 'field';
}
