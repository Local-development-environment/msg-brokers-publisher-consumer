<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Brooches\Brooches\Models\Brooch;

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