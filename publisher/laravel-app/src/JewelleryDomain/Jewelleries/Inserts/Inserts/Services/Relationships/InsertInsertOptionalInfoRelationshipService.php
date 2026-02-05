<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships\InsertInsertOptionalInfoRelationshipRepository;

final class InsertInsertOptionalInfoRelationshipService
{
    public function __construct(public InsertInsertOptionalInfoRelationshipRepository $repository)
    {
    }

    public function index($id): InsertOptionalInfo|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
