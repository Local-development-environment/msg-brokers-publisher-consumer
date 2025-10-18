<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\NeckSizes\Repositories\Relationships;

use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;

final class NeckSizesLengthNameRelationshipRepository
{
    public function index(int $id): LengthName
    {
        return NeckSize::findOrFail($id)->lengthName;
    }
}