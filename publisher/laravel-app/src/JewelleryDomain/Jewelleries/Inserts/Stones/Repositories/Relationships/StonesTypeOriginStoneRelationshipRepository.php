<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models\TypeOrigin;

final class StonesTypeOriginStoneRelationshipRepository
{
    public function index(int $id): TypeOrigin
    {
        return Stone::findOrFail($id)->typeOrigin;
    }
}
