<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertOptionalInfos\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;

final class InsertOptionalInfoInsertRelationshipRepository
{
    public function index(int $id): Insert
    {
        return InsertOptionalInfo::findOrFail($id)->insert;
    }
}