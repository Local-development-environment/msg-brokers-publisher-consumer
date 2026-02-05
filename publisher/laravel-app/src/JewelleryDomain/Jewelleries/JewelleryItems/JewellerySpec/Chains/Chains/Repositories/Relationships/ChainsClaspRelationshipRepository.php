<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;

final class ChainsClaspRelationshipRepository
{
    public function index(int $id): Clasp
    {
        return Chain::findOrFail($id)->clasp;
    }

    public function update(array $data, int $id): void
    {

    }
}
