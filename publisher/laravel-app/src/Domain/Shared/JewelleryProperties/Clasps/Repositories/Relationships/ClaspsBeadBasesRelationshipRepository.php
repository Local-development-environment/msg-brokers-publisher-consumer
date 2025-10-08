<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Repositories\Relationships;

use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Collection;

final class ClaspsBeadBasesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Clasp::findOrFail($id)->beadBases;
    }

    public function update(array $data, int $id): void
    {

    }
}