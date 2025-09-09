<?php

declare(strict_types=1);

namespace Domain\Inserts\GrownStones\Services\Relationships;

use Domain\Inserts\GrownStones\Repositories\Relationships\GrownStonesStoneFamilyRelationshipRepository;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;

final class GrownStonesStoneFamilyRelationshipService
{
    public function __construct(public GrownStonesStoneFamilyRelationshipRepository $repository)
    {
    }

    public function index($id): StoneFamily
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}