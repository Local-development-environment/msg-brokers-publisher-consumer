<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;

final class NecklaceJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Necklace::findOrFail($id)->jewellery;
    }
}
