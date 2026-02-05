<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Repositories\Relationships\StoneOpticalEffectStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneOpticalEffectStoneRelationshipService
{
    public function __construct(public StoneOpticalEffectStoneRelationshipRepository $repository)
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
