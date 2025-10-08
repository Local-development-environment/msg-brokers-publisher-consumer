<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Repositories\Relationships;

use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Collection;

final class ClaspBeadsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Clasp::findOrFail($id)->beads;
    }

    public function update(array $data, int $id): void
    {

    }
}