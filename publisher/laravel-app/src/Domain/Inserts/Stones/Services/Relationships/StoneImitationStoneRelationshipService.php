<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\Stones\Repositories\Relationships\StoneImitationStoneRelationshipRepository;

final class StoneImitationStoneRelationshipService
{
    public function __construct(public StoneImitationStoneRelationshipRepository $repository)
    {
    }

    public function index($id): ImitationStone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}