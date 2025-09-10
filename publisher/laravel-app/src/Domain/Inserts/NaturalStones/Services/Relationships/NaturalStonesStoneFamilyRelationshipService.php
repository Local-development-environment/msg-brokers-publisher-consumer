<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Services\Relationships;

use Domain\Inserts\NaturalStones\Repositories\Relationships\NaturalStonesStoneFamilyRelationshipRepository;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;

final class NaturalStonesStoneFamilyRelationshipService
{
    public function __construct(public NaturalStonesStoneFamilyRelationshipRepository $repository)
    {
    }

    public function index($id): StoneFamily|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}