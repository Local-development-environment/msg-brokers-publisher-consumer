<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Repositories\Relationships\InsertOptionalInfoInsertRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;

final class InsertOptionalInfoInsertRelationshipService
{
    public function __construct(public InsertOptionalInfoInsertRelationshipRepository $repository)
    {
    }

    public function index($id): Insert
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
