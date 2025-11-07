<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Repositories\Relationships;

use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Illuminate\Database\Eloquent\Collection;

final class ChainsWeavingsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Chain::findOrFail($id)->weavings;
    }

    public function update(array $data, int $id): void
    {

    }
}