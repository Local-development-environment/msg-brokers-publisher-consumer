<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class BeadJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Bead::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}
