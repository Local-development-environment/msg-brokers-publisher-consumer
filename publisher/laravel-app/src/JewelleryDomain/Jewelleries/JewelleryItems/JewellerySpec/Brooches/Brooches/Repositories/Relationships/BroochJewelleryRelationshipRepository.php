<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Models\Brooch;

final class BroochJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Brooch::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}
