<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Models\Piercing;

final class PiercingJewelleryRelationshipRepository
{
    public function index(int $id): Jewellery
    {
        return Piercing::findOrFail($id)->jewellery;
    }

    public function update(array $data, int $id): void
    {

    }
}
