<?php

namespace LazyFixturesBundle\Annotation;

/**
 * Class AbstractAnnotation
 * @package LazyFixturesBundle\Annotation
 */
abstract class AbstractAnnotation
{
    /**
     * @var string
     */
    const NAME = '';

    /**
     * @var string
     */
    const TYPE = '';
    
    /**
     * @return string
     */
    public function getClass()
    {
        return get_class($this);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this::NAME;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this::TYPE;
    }
}
