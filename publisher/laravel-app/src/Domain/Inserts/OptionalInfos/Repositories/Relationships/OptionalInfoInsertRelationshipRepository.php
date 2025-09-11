<?php

declare(strict_types=1);

namespace Domain\Inserts\OptionalInfos\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;

final class OptionalInfoInsertRelationshipRepository
{
    public function index(int $id): Insert
    {
        return OptionalInfo::findOrFail($id)->insert;
    }
}