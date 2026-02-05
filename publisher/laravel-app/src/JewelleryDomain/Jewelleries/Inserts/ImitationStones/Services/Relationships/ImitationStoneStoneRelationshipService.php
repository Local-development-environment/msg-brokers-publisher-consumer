<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Repositories\relationships\ImitationStoneStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class ImitationStoneStoneRelationshipService
{
    public function __construct(public ImitationStoneStoneRelationshipRepository $repository)
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
