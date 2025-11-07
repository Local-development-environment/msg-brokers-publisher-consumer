<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

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