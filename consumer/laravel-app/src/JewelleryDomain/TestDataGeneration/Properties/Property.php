<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties;

use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\TestDataGeneration\Properties\Beads\BeadProps;
use JewelleryDomain\TestDataGeneration\Properties\Bracelets\BraceletProps;
use JewelleryDomain\TestDataGeneration\Properties\Brooches\BroochProps;
use JewelleryDomain\TestDataGeneration\Properties\Chains\ChainProps;
use JewelleryDomain\TestDataGeneration\Properties\CharmPendants\CharmPendantProps;
use JewelleryDomain\TestDataGeneration\Properties\CuffLinks\CuffLinkProps;
use JewelleryDomain\TestDataGeneration\Properties\Earrings\EarringProps;
use JewelleryDomain\TestDataGeneration\Properties\Necklaces\NecklaceProps;
use JewelleryDomain\TestDataGeneration\Properties\Pendants\PendantProps;
use JewelleryDomain\TestDataGeneration\Properties\Piercings\PiercingProps;
use JewelleryDomain\TestDataGeneration\Properties\Rings\RingProps;
use JewelleryDomain\TestDataGeneration\Properties\TieClips\TieClipProps;

final class Property
{
    public function getProperties(array $properties): array
    {
        $className = $this->getClassName($properties['jewelleryCategory']);
        $categoryProps = new $className($properties);

        return $categoryProps->getProps();
    }

    private function getClassName($category): string
    {
        return match ($category) {
            JewelleryCategoryNamesEnum::BEADS->value          => BeadProps::class,
            JewelleryCategoryNamesEnum::BRACELETS->value      => BraceletProps::class,
            JewelleryCategoryNamesEnum::BROOCHES->value       => BroochProps::class,
            JewelleryCategoryNamesEnum::CHAINS->value         => ChainProps::class,
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => CharmPendantProps::class,
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => CuffLinkProps::class,
            JewelleryCategoryNamesEnum::EARRINGS->value       => EarringProps::class,
            JewelleryCategoryNamesEnum::NECKLACES->value      => NecklaceProps::class,
            JewelleryCategoryNamesEnum::PENDANTS->value       => PendantProps::class,
            JewelleryCategoryNamesEnum::PIERCINGS->value      => PiercingProps::class,
            JewelleryCategoryNamesEnum::RINGS->value          => RingProps::class,
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => TieClipProps::class,
        };
    }
}
