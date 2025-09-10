<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Repositories\Relationships;

use Domain\Inserts\Stones\Models\Stone;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;

final class StonesTypeOriginStoneRelationshipRepository
{
    public function index(int $id): TypeOrigin
    {
        return Stone::findOrFail($id)->typeOrigin;
    }
}