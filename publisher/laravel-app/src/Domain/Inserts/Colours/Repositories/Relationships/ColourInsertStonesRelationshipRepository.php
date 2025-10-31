<?php

declare(strict_types=1);

namespace Domain\Inserts\Colours\Repositories\Relationships;

use Domain\Inserts\Colours\Models\Colour;
use Illuminate\Database\Eloquent\Collection;

final class ColourInsertStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Colour::find($id)->insertExteriors;
    }
}