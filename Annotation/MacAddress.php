<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class MacAddress extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'MacAddress';

    /**
     * @var string
     */
    const TYPE = 'field';
}
