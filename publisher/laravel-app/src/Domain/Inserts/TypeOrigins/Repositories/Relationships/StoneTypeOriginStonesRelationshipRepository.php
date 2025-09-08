<?php

declare(strict_types=1);

namespace Domain\Inserts\TypeOrigins\Repositories\Relationships;

use Domain\Inserts\Stones\Models\Stone;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Database\Eloquent\Collection;

final class StoneTypeOriginStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return TypeOrigin::find($id)->stones;
    }
}