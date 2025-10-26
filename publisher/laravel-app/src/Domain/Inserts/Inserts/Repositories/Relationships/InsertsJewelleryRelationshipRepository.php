<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;

final class InsertsJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Insert::findOrFail($id)->jewellery;
    }
}