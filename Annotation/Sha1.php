<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Sha1 extends AbstractAnnotation implements LazyFixtureAnnotation 
{
    /**
     * @var string
     */
    const NAME = 'Sha1';

    /**
     * @var string
     */
    const TYPE = 'field';
}
