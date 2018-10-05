<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class FirstName extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'FirstName';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * male|female
     * @var string|null
     */
    public $gender = null;
}
