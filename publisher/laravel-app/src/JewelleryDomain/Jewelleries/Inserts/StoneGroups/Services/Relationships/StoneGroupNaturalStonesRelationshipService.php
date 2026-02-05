<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGroups\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Repositories\Relationships\StoneGroupNaturalStonesRelationshipRepository;

final class StoneGroupNaturalStonesRelationshipService
{
    public function __construct(public StoneGroupNaturalStonesRelationshipRepository $repository)
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
