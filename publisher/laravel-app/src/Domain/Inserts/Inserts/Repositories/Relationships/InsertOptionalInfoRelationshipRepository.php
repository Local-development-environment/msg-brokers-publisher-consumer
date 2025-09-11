<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;

final class InsertOptionalInfoRelationshipRepository
{
    public function index(int $id): OptionalInfo
    {
        return Insert::findOrFail($id)->optionalInfo;
    }
}