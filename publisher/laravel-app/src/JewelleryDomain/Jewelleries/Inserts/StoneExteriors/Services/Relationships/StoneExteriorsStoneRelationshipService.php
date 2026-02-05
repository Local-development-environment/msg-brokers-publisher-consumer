<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships\StoneExteriorsStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneExteriorsStoneRelationshipService
{
    public function __construct(public StoneExteriorsStoneRelationshipRepository $repository)
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
