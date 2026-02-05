<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Repositories\Relationships\OpticalEffectOpticalEffectStonesRelationshipRepository;

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
