<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;

final class BraceletJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Bracelet::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}
