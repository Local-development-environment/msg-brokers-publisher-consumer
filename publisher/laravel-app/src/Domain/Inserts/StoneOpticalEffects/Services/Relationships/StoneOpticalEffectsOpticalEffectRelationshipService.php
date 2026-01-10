<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneOpticalEffects\Services\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\StoneOpticalEffects\Repositories\Relationships\StoneOpticalEffectsOpticalEffectRelationshipRepository;

final class StoneOpticalEffectsOpticalEffectRelationshipService
{
    public function __construct(public StoneOpticalEffectsOpticalEffectRelationshipRepository $repository)
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
