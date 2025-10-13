<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Repositories\Relationships;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;

final class BeadSizesLengthNameRelationshipRepository
{
    public function index(int $id): LengthName
    {
        return BeadSize::findOrFail($id)->lengthName;
    }
}