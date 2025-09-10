<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFamilies\Repositories\Relationships;

use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Illuminate\Database\Eloquent\Collection;

final class StoneFamilyGrownStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneFamily::findOrFail($id)->grownStones;
    }
}