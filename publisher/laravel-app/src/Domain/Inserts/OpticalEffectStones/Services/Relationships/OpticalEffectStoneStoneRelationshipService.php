<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Services\Relationships;

use Domain\Inserts\OpticalEffectStones\Repositories\Relationships\OpticalEffectStoneStoneRelationshipRepository;
use Domain\Inserts\Stones\Models\Stone;

final class OpticalEffectStoneStoneRelationshipService
{
    public function __construct(public OpticalEffectStoneStoneRelationshipRepository $repository)
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