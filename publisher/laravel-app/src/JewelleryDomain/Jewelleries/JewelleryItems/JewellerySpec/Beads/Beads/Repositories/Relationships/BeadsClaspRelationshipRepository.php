<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;

final class BeadsClaspRelationshipRepository
{
    public function index(int $id): Clasp
    {
        return Bead::findOrFail($id)->clasp;
    }

    public function update(array $data, int $id): void
    {

    }
}
