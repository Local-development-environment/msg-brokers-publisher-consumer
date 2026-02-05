<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Repositories\Relationships\StoneTypeOriginStonesRelationshipRepository;

final class StoneTypeOriginStonesRelationshipService
{
    public function __construct(public StoneTypeOriginStonesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
