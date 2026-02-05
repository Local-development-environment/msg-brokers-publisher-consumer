<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships\StoneGrownStoneRelationshipRepository;

final class StoneGrownStoneRelationshipService
{
    public function __construct(public StoneGrownStoneRelationshipRepository $repository)
    {
    }

    public function index($id): GrownStone|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
