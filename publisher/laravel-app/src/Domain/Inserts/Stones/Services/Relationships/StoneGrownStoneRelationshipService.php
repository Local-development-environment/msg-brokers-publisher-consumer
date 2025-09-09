<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\Stones\Repositories\Relationships\StoneGrownStoneRelationshipRepository;

final class StoneGrownStoneRelationshipService
{
    public function __construct(public StoneGrownStoneRelationshipRepository $repository)
    {
    }

    public function index($id): GrownStone|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}