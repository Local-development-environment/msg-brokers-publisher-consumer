<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;

final class NecklaceJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Necklace::findOrFail($id)->jewellery;
    }
}