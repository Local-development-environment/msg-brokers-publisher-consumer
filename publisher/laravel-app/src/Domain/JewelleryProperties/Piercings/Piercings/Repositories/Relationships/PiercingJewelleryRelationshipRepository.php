<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Repositories\Relationships;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Piercings\Piercings\Models\Piercing;

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