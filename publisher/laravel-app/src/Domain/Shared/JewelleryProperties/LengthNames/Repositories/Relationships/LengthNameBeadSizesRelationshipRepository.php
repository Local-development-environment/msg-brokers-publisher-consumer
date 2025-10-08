<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Repositories\Relationships;

use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Database\Eloquent\Collection;

final class LengthNameBeadSizesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return LengthName::findOrFail($id)->beadSizes;
    }

    public function update(array $data, int $id): void
    {

    }
}