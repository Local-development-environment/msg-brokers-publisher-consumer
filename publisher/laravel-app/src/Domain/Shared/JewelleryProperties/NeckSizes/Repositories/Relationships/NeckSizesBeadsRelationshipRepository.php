<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships;

use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Collection;

final class NeckSizesBeadsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return NeckSize::findOrFail($id)->beads;
    }
}