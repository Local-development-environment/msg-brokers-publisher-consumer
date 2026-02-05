<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneColours\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Models\StoneColour;

final class StoneColourStoneExteriorsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneColour::find($id)->stoneExteriors;
    }
}
