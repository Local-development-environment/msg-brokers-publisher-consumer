<?php

declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Services\Relationships;

use Domain\Inserts\ImitationStones\Repositories\relationships\ImitationStoneStoneRelationshipRepository;
use Domain\Inserts\Stones\Models\Stone;

final class ImitationStoneStoneRelationshipService
{
    public function __construct(public ImitationStoneStoneRelationshipRepository $repository)
    {
    }

    public function index($id): Stone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}