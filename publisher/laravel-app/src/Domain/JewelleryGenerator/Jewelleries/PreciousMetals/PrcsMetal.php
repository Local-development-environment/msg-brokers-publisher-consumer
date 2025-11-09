<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\PreciousMetals;

use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\PreciousMetals\Metals\Enums\MetalListEnum;

final class PrcsMetal
{
    use ProbabilityArrayElementTrait;

    public function getMetal(): string
    {
        $enumClass = get_class(MetalListEnum::GOLDEN);
        $enumCases = MetalListEnum::cases();

        return $this->getArrElement($enumClass, $enumCases);
    }
}
