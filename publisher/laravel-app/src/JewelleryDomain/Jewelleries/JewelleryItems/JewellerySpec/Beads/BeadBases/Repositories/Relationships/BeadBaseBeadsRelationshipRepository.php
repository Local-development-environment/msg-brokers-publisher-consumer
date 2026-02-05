<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Models\BeadBase;

final class BeadBaseBeadsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return BeadBase::findOrFail($id)->beads;
    }
}
