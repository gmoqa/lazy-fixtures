<?php

namespace LazyFixturesBundle\Annotation\Interfaces;

use Doctrine\ORM\Mapping\Annotation;

/**
 * Interface LazyFixtureAnnotation
 * @package LazyFixturesBundle\Annotation\Interfaces
 */
interface LazyFixtureAnnotation extends Annotation
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return mixed
     */
    public function getClass();
}