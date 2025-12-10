<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Properties;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;

final class Property
{
    public function getProperties(array $properties): array
    {
//        dd($properties);
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
            CategoryBuilderEnum::BRACELETS->value      => 'getBraceletProps',
            CategoryBuilderEnum::BROOCHES->value       => 'getBroochProps',
            CategoryBuilderEnum::TIE_CLIPS->value      => 'getTieClipProps',
            CategoryBuilderEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            CategoryBuilderEnum::NECKLACES->value      => 'getNecklaceProps',
            CategoryBuilderEnum::RINGS->value          => 'getRingProps',
            CategoryBuilderEnum::PIERCINGS->value      => 'getPiercingProps',
            CategoryBuilderEnum::PENDANTS->value       => 'getPendantProps',
            CategoryBuilderEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            CategoryBuilderEnum::EARRINGS->value       => 'getEarringProps',
            CategoryBuilderEnum::CHAINS->value         => 'getChainProps',
            CategoryBuilderEnum::BEADS->value          => 'getBeadProps',
        };
    }

    private function getClassName($category): string
    {
        return match ($category) {
            CategoryBuilderEnum::BRACELETS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Bracelets\BraceletProps',
            CategoryBuilderEnum::BROOCHES->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Brooches\BroochProps',
            CategoryBuilderEnum::TIE_CLIPS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\TieClips\TieClipProps',
            CategoryBuilderEnum::CUFF_LINKS->value     => 'Domain\JewelleryGenerator\Jewelleries\Properties\CuffLinks\CuffLinkProps',
            CategoryBuilderEnum::NECKLACES->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Necklaces\NecklaceProps',
            CategoryBuilderEnum::RINGS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Rings\RingProps',
            CategoryBuilderEnum::PIERCINGS->value      => 'Domain\JewelleryGenerator\Jewelleries\Properties\Piercings\PiercingProps',
            CategoryBuilderEnum::PENDANTS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Pendants\PendantProps',
            CategoryBuilderEnum::CHARM_PENDANTS->value => 'Domain\JewelleryGenerator\Jewelleries\Properties\CharmPendants\CharmPendantProps',
            CategoryBuilderEnum::EARRINGS->value       => 'Domain\JewelleryGenerator\Jewelleries\Properties\Earrings\EarringProps',
            CategoryBuilderEnum::CHAINS->value         => 'Domain\JewelleryGenerator\Jewelleries\Properties\Chains\ChainProps',
            CategoryBuilderEnum::BEADS->value          => 'Domain\JewelleryGenerator\Jewelleries\Properties\Beads\BeadProps',
        };
    }
}
