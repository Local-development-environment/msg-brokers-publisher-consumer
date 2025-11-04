<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;

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