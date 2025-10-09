<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;

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