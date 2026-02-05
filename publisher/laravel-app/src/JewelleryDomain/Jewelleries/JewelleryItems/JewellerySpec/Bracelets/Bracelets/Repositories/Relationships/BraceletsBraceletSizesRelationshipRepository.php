<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

final class BraceletsBraceletSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Bracelet::findOrFail($id)->braceletSizes;
    }

    public function update(array $data, int $id): void
    {

    }
}
