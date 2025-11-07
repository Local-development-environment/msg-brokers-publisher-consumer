<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;

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