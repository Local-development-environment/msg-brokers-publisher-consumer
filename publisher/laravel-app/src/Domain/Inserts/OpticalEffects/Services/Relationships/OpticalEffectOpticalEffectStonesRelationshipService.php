<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffects\Services\Relationships;

use Domain\Inserts\OpticalEffects\Repositories\Relationships\OpticalEffectOpticalEffectStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class OpticalEffectOpticalEffectStonesRelationshipService
{
    public function __construct(public OpticalEffectOpticalEffectStonesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}