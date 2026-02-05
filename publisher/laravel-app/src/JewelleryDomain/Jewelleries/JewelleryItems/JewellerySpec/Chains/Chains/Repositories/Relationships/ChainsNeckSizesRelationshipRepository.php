<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;

final class ChainsNeckSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Chain::findOrFail($id)->neckSizes;
    }

    public function update(array $data, int $id): void
    {

    }
}
