<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFamilies\Services\Relationships;

use Domain\Inserts\StoneFamilies\Repositories\Relationships\StoneFamilyGrownStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

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