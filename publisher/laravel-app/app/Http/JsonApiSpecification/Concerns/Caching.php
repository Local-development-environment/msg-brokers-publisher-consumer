<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\JsonApiResource;
use App\Http\JsonApiSpecification\JsonApiResourceCollection;
use Illuminate\Support\Collection;

trait Caching
{
    /**
     * @internal
     *
     * @infection-ignore-all
     *
     * @return void
     */
    public function flush(): void
    {
        // TODO can we just let this garbage collect?
        $this->requestedRelationshipsCache?->each(fn (JsonApiResource|JsonApiResourceCollection $relation) => $relation->flush());

        $this->requestedRelationshipsCache = null;

        $this->idCache = null;

        $this->typeCache = null;
    }

    /**
     * @internal
     *
     * @return Collection<string, JsonApiResource|JsonApiResourceCollection>|null
     */
    public function requestedRelationshipsCache(): ?Collection
    {
        // TODO can we remove this if we ditch caching? Only here for tests.
        return $this->requestedRelationshipsCache;
    }
}
