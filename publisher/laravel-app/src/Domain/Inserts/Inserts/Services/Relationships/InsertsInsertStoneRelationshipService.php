<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\Inserts\Repositories\Relationships\InsertsInsertStoneRelationshipRepository;
use Domain\Inserts\InsertStones\Models\InsertStone;

final class InsertsInsertStoneRelationshipService
{
    public function __construct(public InsertsInsertStoneRelationshipRepository $repository)
    {
    }

    public function index($id): InsertStone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}