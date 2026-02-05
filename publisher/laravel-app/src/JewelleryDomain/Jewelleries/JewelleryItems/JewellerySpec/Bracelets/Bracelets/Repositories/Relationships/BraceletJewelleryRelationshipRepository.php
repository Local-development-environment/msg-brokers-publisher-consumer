<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

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
