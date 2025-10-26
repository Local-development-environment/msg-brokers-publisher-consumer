<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;

final class InsertInsertOptionalInfoRelationshipRepository
{
    public function index(int $id): InsertOptionalInfo|null
    {
        return Insert::findOrFail($id)->insertOptionalInfo;
    }
}