<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties;

use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;

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
            JewelleryCategoryBuilderEnum::BRACELETS->value      => 'getBraceletProps',
            JewelleryCategoryBuilderEnum::BROOCHES->value       => 'getBroochProps',
            JewelleryCategoryBuilderEnum::TIE_CLIPS->value      => 'getTieClipProps',
            JewelleryCategoryBuilderEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            JewelleryCategoryBuilderEnum::NECKLACES->value      => 'getNecklaceProps',
            JewelleryCategoryBuilderEnum::RINGS->value          => 'getRingProps',
            JewelleryCategoryBuilderEnum::PIERCINGS->value      => 'getPiercingProps',
            JewelleryCategoryBuilderEnum::PENDANTS->value       => 'getPendantProps',
            JewelleryCategoryBuilderEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            JewelleryCategoryBuilderEnum::EARRINGS->value       => 'getEarringProps',
            JewelleryCategoryBuilderEnum::CHAINS->value         => 'getChainProps',
            JewelleryCategoryBuilderEnum::BEADS->value          => 'getBeadProps',
        };
    }

    private function getClassName($category): string
    {
        return match ($category) {
            JewelleryCategoryBuilderEnum::BRACELETS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Bracelets\BraceletProps',
            JewelleryCategoryBuilderEnum::BROOCHES->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Brooches\BroochProps',
            JewelleryCategoryBuilderEnum::TIE_CLIPS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\TieClips\TieClipProps',
            JewelleryCategoryBuilderEnum::CUFF_LINKS->value     => 'Domain\JewelleryGenerator\Jewelleries\Properties\CuffLinks\CuffLinkProps',
            JewelleryCategoryBuilderEnum::NECKLACES->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Necklaces\NecklaceProps',
            JewelleryCategoryBuilderEnum::RINGS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Rings\RingProps',
            JewelleryCategoryBuilderEnum::PIERCINGS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Piercings\PiercingProps',
            JewelleryCategoryBuilderEnum::PENDANTS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Pendants\PendantProps',
            JewelleryCategoryBuilderEnum::CHARM_PENDANTS->value => 'Domain\JewelleryGenerator\Jewelleries\Properties\CharmPendants\CharmPendantProps',
            JewelleryCategoryBuilderEnum::EARRINGS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Earrings\EarringProps',
            JewelleryCategoryBuilderEnum::CHAINS->value         => 'Domain\JewelleryGenerator\Jewelleries\Properties\Chains\ChainProps',
            JewelleryCategoryBuilderEnum::BEADS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Beads\BeadProps',
        };
    }
}
