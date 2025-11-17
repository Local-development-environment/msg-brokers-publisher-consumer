<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Metals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeEnum;
use Illuminate\Support\Facades\DB;

final class MetalType
{
    use ProbabilityArrayElementTrait;

    public function getMetalType(): ?object
    {
        $enumClass = get_class(MetalTypeBuilderEnum::GOLDEN);
        $enumCases = MetalTypeBuilderEnum::cases();

        $metalType = $this->getArrElement($enumClass, $enumCases);

        return DB::table(MetalTypeEnum::TABLE_NAME->value)->where('name', $metalType)->first();
    }
}
