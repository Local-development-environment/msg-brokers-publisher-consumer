<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneExteriorInsertsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneExterior::find($id)->inserts;
    }
}
