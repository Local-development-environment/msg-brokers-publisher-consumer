<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Repositories\Relationships\GrownStoneStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class GrownStoneStoneRelationshipService
{
    public function __construct(public GrownStoneStoneRelationshipRepository $repository)
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
