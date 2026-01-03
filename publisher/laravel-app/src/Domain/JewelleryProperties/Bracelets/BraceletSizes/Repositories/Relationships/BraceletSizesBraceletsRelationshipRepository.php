<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Repositories\Relationships;

use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Illuminate\Database\Eloquent\Collection;

final class BraceletSizesBraceletsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return BraceletSize::findOrFail($id)->bracelets;
    }

    public function update(array $data, int $id): void
    {

    }
}
