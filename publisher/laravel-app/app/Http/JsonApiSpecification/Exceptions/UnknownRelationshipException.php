<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Exceptions;

use App\Http\JsonApiSpecification\JsonApiResource;
use App\Http\JsonApiSpecification\JsonApiResourceCollection;
use Exception;

/**
 * @internal
 */
final class UnknownRelationshipException extends Exception
{
    /**
     * @param mixed $resource
     * @return self
     */
    public static function from(mixed $resource): UnknownRelationshipException
    {
        return new self('Unknown relationship encountered. Relationships should always return a class that extends '.JsonApiResource::class.' or '.JsonApiResourceCollection::class.'. Instead found ['.self::determineType($resource).'].');
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
