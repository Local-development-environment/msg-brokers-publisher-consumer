<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Database\Eloquent\Collection;

final class NecklacesNeckSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Necklace::findOrFail($id)->neckSizes;
    }

    public function update(array $data, int $id): void
    {

    }
}