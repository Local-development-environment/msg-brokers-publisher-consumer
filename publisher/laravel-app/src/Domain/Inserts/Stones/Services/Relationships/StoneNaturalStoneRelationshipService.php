<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\Stones\Repositories\Relationships\StoneNaturalStoneRelationshipRepository;

final class StoneNaturalStoneRelationshipService
{
    public function __construct(public StoneNaturalStoneRelationshipRepository $repository)
    {
    }

    public function index($id): NaturalStone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}