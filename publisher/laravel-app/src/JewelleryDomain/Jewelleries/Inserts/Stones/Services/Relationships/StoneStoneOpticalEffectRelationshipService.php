<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships;

use Illuminate\Database\Eloquent\Model;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships\StoneStoneOpticalEffectRelationshipRepository;

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
