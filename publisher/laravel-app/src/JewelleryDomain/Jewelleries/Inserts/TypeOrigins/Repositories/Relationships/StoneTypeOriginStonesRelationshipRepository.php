<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models\TypeOrigin;

final class StoneTypeOriginStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return TypeOrigin::find($id)->stones;
    }
}
