<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;

final class ChainJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Chain::findOrFail($id)->weavings;
    }

    public function update(array $data, int $id): void
    {

    }
}
