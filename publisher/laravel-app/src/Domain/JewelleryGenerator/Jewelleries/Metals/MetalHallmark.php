<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Metals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalHallmarks\Enums\MetalHallmarkEnum;
use Illuminate\Support\Facades\DB;

final class MetalHallmark
{
    use ProbabilityArrayElementTrait;

    public function getMetalHallmark(int $metalTypeId, int $hallmarkId): int
    {
        return DB::table(MetalHallmarkEnum::TABLE_NAME->value)
            ->where('metal_type_id', $metalTypeId)
            ->where('hallmark_id', $hallmarkId)
            ->value('id');
    }
}