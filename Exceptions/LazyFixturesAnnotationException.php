<?php

namespace LazyFixturesBundle\Exceptions;

class LazyFixturesAnnotationException extends \Exception
{
    const INVALID_QUANTITY = "Invalid Quantity on : %s";
    
    const INVALID_DEPENDENCIES = "Invalid dependencies on : %s";
    
    const INVALID_FIELD_TYPE = "Invalid type on : %s > %s";
    
    const INVALID_RELATION = "Invalid Relation on : %s";
    
    /**
     * @param string $entityName
     * @return LazyFixturesAnnotationException
     */
    public static function invalidQuantity(string $entityName) :self
    {
        return new self(sprintf(static::INVALID_QUANTITY, $entityName));
    }

    /**
     * @param string $entityName
     * @return LazyFixturesAnnotationException
     */
    public static function invalidDependencies(string $entityName) :self
    {
        return new self(sprintf(static::INVALID_DEPENDENCIES, $entityName));
    }

    /**
     * @param string $entityName
     * @param string $fieldName
     * @return LazyFixturesAnnotationException
     */
    public static function invalidFieldType(string $entityName, string $fieldName) :self
    {
        return new self(sprintf(static::INVALID_FIELD_TYPE, $entityName, $fieldName));
    }

    /**
     * @param string $entityName
     * @return LazyFixturesAnnotationException
     */
    public static function invalidRelation(string $entityName) :self
    {
        return new self(sprintf(static::INVALID_RELATION, $entityName));
    }
}
