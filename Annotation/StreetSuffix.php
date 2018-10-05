<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 * @author Guillermo Quinteros <gu.quinteros@gmail.com>
 */
final class StreetSuffix extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'StreetSuffix';

    /**
     * @var string
     */
    const TYPE = 'field';
}
