<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Database\Eloquent\Collection;

final class BeadsBeadBaseRelationshipRepository
{
    public function index(int $id): BeadBase
    {
        return Bead::findOrFail($id)->beadBase;
    }

    public function update(array $data, int $id): void
    {

    }
}