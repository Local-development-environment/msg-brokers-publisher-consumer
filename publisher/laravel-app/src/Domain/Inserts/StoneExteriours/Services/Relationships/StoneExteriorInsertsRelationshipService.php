<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Services\Relationships;

use Domain\Inserts\StoneExteriours\Repositories\Relationships\StoneExteriorInsertsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneExteriorInsertsRelationshipService
{
    public function __construct(public StoneExteriorInsertsRelationshipRepository $repository)
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