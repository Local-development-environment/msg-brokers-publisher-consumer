<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Repositories\Relationships\StoneFamilyGrownStonesRelationshipRepository;

final class StoneFamilyGrownStonesRelationshipService
{
    public function __construct(public StoneFamilyGrownStonesRelationshipRepository $repository)
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
