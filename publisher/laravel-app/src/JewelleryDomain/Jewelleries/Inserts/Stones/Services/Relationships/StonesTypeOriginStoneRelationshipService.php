<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships\StonesTypeOriginStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models\TypeOrigin;

final class StonesTypeOriginStoneRelationshipService
{
    public function __construct(public StonesTypeOriginStoneRelationshipRepository $repository)
    {
    }

    public function index($id): TypeOrigin
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
