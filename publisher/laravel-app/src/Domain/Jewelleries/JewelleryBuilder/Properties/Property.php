<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Domain\Jewelleries\Categories\Enums\CategoryListEnum;

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
            CategoryListEnum::BRACELETS->value      => 'getBraceletProps',
            CategoryListEnum::BROOCHES->value       => 'getBroochProps',
            CategoryListEnum::TIE_CLIPS->value      => 'getTieClipProps',
            CategoryListEnum::CUFF_LINKS->value     => 'getCuffLinkProps',
            CategoryListEnum::NECKLACES->value      => 'getNecklaceProps',
            CategoryListEnum::RINGS->value          => 'getRingProps',
            CategoryListEnum::PIERCINGS->value      => 'getPiercingProps',
            CategoryListEnum::PENDANTS->value       => 'getPendantProps',
            CategoryListEnum::CHARM_PENDANTS->value => 'getCharmPendantProps',
            CategoryListEnum::EARRINGS->value       => 'getEarringProps',
            CategoryListEnum::CHAINS->value         => 'getChainProps',
            CategoryListEnum::BEADS->value          => 'getBeadProps',
        };
    }

    private function getClassName($category): string
    {
        return match ($category) {
            CategoryListEnum::BRACELETS->value      => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BraceletProps',
            CategoryListEnum::BROOCHES->value       => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BroochProps',
            CategoryListEnum::TIE_CLIPS->value      => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\TieClipProps',
            CategoryListEnum::CUFF_LINKS->value     => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\CuffLinkProps',
            CategoryListEnum::NECKLACES->value      => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\NecklaceProps',
            CategoryListEnum::RINGS->value          => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\RingProps',
            CategoryListEnum::PIERCINGS->value      => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\PiercingProps',
            CategoryListEnum::PENDANTS->value       => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\PendantProps',
            CategoryListEnum::CHARM_PENDANTS->value => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\CharmPendantProps',
            CategoryListEnum::EARRINGS->value       => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\EarringProps',
            CategoryListEnum::CHAINS->value         => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\ChainProps',
            CategoryListEnum::BEADS->value          => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BeadProps',
        };
    }
}
