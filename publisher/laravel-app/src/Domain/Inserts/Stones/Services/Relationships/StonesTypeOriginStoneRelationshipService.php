<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\Stones\Models\Stone;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;

final class StonesTypeOriginStoneRelationshipService
{
    public function index(int $id): TypeOrigin
    {
        return Stone::find($id)->typeOrigin;
    }
}