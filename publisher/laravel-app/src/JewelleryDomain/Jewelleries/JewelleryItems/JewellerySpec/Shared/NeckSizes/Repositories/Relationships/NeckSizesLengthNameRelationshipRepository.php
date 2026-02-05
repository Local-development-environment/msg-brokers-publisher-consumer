<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Repositories\Relationships;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models\LengthName;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class NeckSizesLengthNameRelationshipRepository
{
    public function index(int $id): LengthName
    {
        return NeckSize::findOrFail($id)->lengthName;
    }
}
