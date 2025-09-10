<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Services\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffectStones\Repositories\Relationships\OpticalEffectStonesOpticalEffectRelationshipRepository;

final class OpticalEffectStonesOpticalEffectRelationshipService
{
    public function __construct(public OpticalEffectStonesOpticalEffectRelationshipRepository $repository)
    {
    }

    public function index($id): OpticalEffect
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}