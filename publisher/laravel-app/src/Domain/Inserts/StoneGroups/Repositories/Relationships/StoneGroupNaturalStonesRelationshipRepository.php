<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Repositories\Relationships;

use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Illuminate\Database\Eloquent\Collection;

final class StoneGroupNaturalStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneGroup::find($id)->naturalStones;
    }
}