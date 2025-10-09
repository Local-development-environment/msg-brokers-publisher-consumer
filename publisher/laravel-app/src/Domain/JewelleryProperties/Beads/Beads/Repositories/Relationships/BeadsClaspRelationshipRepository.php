<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

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