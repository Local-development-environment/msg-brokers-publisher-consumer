<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Repositories\Relationships;

use Domain\Inserts\Colours\Models\StoneColour;
use Illuminate\Database\Eloquent\Collection;

final class StoneColourStoneExteriorsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneColour::find($id)->stoneExteriors;
    }
}
