<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties;

use Domain\Jewelleries\Categories\Enums\CategoryBuildEnum;

final class Property
{
    public function getProperties(array $properties): array
    {
        $className = $this->getClassName($properties['category']);
        $categoryProps = new $className($properties);

        return [
            'name-function' => $this->getNameFunction($properties['category']),
            'parameters' => $categoryProps->getProps(),
        ];
    }

    private function getNameFunction($category): string
    {
        return match ($category) {
            CategoryBuildEnum::BRACELETS->value      => 'getBraceletProps',
            CategoryBuildEnum::BROOCHES->value       => 'getBroochProps',
            CategoryBuildEnum::TIE_CLIPS->value      => 'getTieClipProps',
            CategoryBuildEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            CategoryBuildEnum::NECKLACES->value      => 'getNecklaceProps',
            CategoryBuildEnum::RINGS->value          => 'getRingProps',
            CategoryBuildEnum::PIERCINGS->value      => 'getPiercingProps',
            CategoryBuildEnum::PENDANTS->value       => 'getPendantProps',
            CategoryBuildEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            CategoryBuildEnum::EARRINGS->value       => 'getEarringProps',
            CategoryBuildEnum::CHAINS->value         => 'getChainProps',
            CategoryBuildEnum::BEADS->value          => 'getBeadProps',
        };
    }

    private function getClassName($category): string
    {
        return match ($category) {
            CategoryBuildEnum::BRACELETS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Bracelets\BraceletProps',
            CategoryBuildEnum::BROOCHES->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Brooches\BroochProps',
            CategoryBuildEnum::TIE_CLIPS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\TieClips\TieClipProps',
            CategoryBuildEnum::CUFF_LINKS->value     => 'Domain\JewelleryGenerator\Jewelleries\Properties\CuffLinks\CuffLinkProps',
            CategoryBuildEnum::NECKLACES->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Necklaces\NecklaceProps',
            CategoryBuildEnum::RINGS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Rings\RingProps',
            CategoryBuildEnum::PIERCINGS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Piercings\PiercingProps',
            CategoryBuildEnum::PENDANTS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Pendants\PendantProps',
            CategoryBuildEnum::CHARM_PENDANTS->value => 'Domain\JewelleryGenerator\Jewelleries\Properties\CharmPendants\CharmPendantProps',
            CategoryBuildEnum::EARRINGS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Earrings\EarringProps',
            CategoryBuildEnum::CHAINS->value         => 'Domain\JewelleryGenerator\Jewelleries\Properties\Chains\ChainProps',
            CategoryBuildEnum::BEADS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Beads\BeadProps',
        };
    }
}
