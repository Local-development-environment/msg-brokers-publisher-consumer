<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Services\Relationships;

use Domain\Inserts\Colours\Repositories\Relationships\ColourInsertStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class ColourInsertStonesRelationshipService
{
    public function __construct(public ColourInsertStonesRelationshipRepository $repository)
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