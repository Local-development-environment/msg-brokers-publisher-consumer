<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Services\Relationships;

use Domain\Inserts\InsertStones\Repositories\Relationships\InsertStonesStoneColourRelationshipRepository;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Database\Eloquent\Collection;

final class InsertStonesStoneColourRelationshipService
{
    public function __construct(public InsertStonesStoneColourRelationshipRepository $repository)
    {
    }

    public function index($id): StoneColour
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}