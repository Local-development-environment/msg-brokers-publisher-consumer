<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class BeadsNeckSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Bead::findOrFail($id)->beadSizes;
    }

    public function update(array $data, int $id): void
    {

    }
}
