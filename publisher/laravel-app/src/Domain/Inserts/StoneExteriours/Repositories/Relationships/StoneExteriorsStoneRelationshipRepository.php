<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Repositories\Relationships;

use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Domain\Inserts\Stones\Models\Stone;

final class StoneExteriorsStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return StoneExterior::find($id)->stone;
    }
}