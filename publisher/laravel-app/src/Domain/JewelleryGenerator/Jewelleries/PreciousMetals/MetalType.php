<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\PreciousMetals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeListEnum;

final class MetalType
{
    use ProbabilityArrayElementTrait;

    public function getMetalType(): string
    {
        $enumClass = get_class(MetalTypeListEnum::GOLDEN);
        $enumCases = MetalTypeListEnum::cases();

        return $this->getArrElement($enumClass, $enumCases);
    }
}
