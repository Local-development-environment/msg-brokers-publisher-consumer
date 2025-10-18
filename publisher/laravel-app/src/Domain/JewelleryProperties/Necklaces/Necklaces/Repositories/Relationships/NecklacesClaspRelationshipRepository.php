<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Repositories\Relationships;

use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;

final class NecklacesClaspRelationshipRepository
{
    public function index(int $id): Clasp
    {
        return Necklace::findOrFail($id)->clasp;
    }
}