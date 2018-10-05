<?php

namespace LazyFixturesBundle\Annotation;

use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class ImageUrl extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'ImageUrl';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var int
     */
    public $width = 640;

    /**
     * @var int
     */
    public $height = 480;
}
