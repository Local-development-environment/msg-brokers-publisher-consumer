<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;

final class InsertsStoneExteriorRelationshipRepository
{
    public function index(int $id): StoneExterior
    {
        return Insert::findOrFail($id)->stoneExterior;
    }
}