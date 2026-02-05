<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;

final class InsertsJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Insert::findOrFail($id)->jewellery;
    }
}
