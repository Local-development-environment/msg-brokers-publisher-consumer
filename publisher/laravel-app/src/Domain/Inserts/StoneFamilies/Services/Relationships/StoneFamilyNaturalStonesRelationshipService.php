<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFamilies\Services\Relationships;

use Domain\Inserts\StoneFamilies\Repositories\Relationships\StoneFamilyNaturalStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneFamilyNaturalStonesRelationshipService
{
    public function __construct(public StoneFamilyNaturalStonesRelationshipRepository $repository)
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