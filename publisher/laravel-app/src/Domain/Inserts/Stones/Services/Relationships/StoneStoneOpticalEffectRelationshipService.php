<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;
use Domain\Inserts\Stones\Repositories\Relationships\StoneStoneOpticalEffectRelationshipRepository;
use Illuminate\Database\Eloquent\Model;

final class StoneStoneOpticalEffectRelationshipService
{
    public function __construct(public StoneStoneOpticalEffectRelationshipRepository $repository)
    {
    }

    public function index($id): StoneOpticalEffect|Model|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
