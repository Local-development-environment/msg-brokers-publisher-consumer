<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Database\Eloquent\Collection;

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
