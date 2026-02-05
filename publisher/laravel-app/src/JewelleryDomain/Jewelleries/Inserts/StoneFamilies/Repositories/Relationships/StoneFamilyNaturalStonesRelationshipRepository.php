<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

final class StoneFamilyNaturalStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneFamily::findOrFail($id)->naturalStones;
    }
}
