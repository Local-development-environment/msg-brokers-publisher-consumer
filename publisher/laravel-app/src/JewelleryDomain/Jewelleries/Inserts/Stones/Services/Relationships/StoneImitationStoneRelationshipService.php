<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships\StoneImitationStoneRelationshipRepository;

final class StoneImitationStoneRelationshipService
{
    public function __construct(public StoneImitationStoneRelationshipRepository $repository)
    {
    }

    public function index($id): ImitationStone|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
