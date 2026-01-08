<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneColours\Repositories\Relationships;

use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Database\Eloquent\Collection;

final class StoneColourStoneExteriorsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneColour::find($id)->stoneExteriors;
    }
}
