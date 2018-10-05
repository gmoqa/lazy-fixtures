<?php

namespace LazyFixturesBundle\Annotation;
 
use LazyFixturesBundle\Annotation\Interfaces\LazyFixtureAnnotation;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
final class Image extends AbstractAnnotation implements LazyFixtureAnnotation
{
    /**
     * @var string
     */
    const NAME = 'Image';

    /**
     * @var string
     */
    const TYPE = 'field';

    /**
     * @var string 
     */
    public $dir = '/tmp';

    /**
     * @var int
     */
    public $width = 640;

    /**
     * @var int
     */
    public $height = 480;
}
