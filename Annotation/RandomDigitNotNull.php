<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
final class RandomDigitNotNull extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'RandomDigitNotNull';

    /**
     * @var string
     */
    const TYPE = 'field';
}
