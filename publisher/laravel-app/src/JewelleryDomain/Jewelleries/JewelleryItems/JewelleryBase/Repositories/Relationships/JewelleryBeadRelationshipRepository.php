<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class JewelleryBeadRelationshipRepository
{
    public function index(int $id): Bead
    {
        return Jewellery::findOrFail($id)->bead;
    }

    public function update(array $data, int $id): void
    {

    }
}
