<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Models\BeadBase;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

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
