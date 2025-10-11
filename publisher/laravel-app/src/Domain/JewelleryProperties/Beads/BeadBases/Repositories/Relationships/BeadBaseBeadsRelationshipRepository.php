<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Illuminate\Database\Eloquent\Collection;

final class BeadBaseBeadsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return BeadBase::findOrFail($id)->beads;
    }
}