<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Exceptions;

use RuntimeException;

/**
 * @internal
 */
final class ResourceIdentificationException extends RuntimeException
{
    /**
     * @param mixed $resource
     * @return self
     */
    public static function attemptingToDetermineIdFor(mixed $resource): ResourceIdentificationException
    {
        return new self('Unable to resolve resource object id for ['.self::determineType($resource).'].');
    }

    /**
     * @param mixed $resource
     * @return self
     */
    public static function attemptingToDetermineTypeFor(mixed $resource): ResourceIdentificationException
    {
        return new self('Unable to resolve resource object type for ['.self::determineType($resource).'].');
    }

    /**
     * @param mixed $resource
     * @return string
     */
    private static function determineType(mixed $resource): string
    {
        return is_object($resource)
            ? $resource::class
            : gettype($resource);
    }
}
