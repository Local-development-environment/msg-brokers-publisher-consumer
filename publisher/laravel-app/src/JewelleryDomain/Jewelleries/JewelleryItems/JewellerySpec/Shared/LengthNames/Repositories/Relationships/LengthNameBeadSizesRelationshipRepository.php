<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models\LengthName;

final class LengthNameBeadSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return LengthName::findOrFail($id)->beadSizes;
    }
}
