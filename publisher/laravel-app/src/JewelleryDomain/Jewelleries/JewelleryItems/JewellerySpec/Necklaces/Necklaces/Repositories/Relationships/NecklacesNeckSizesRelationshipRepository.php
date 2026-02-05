<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;

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
