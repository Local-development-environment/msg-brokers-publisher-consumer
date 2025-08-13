<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

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
            'браслеты' => 'getBraceletProps',
            'броши' => 'getBroochProps',
            'зажим для галстука' => 'getTieClipProps',
            'запонки' => 'getCuffLinkProps',
            'колье' => 'getNecklaceProps',
            'кольца' => 'getRingProps',
            'пирсинг' => 'getPiercingProps',
            'подвески' => 'getPendantProps',
            'подвески-шарм' => 'getCharmPendantProps',
            'серьги' => 'getEarringProps',
            'цепи' => 'getChainProps',
            'бусы' => 'getBeadProps',
        };
    }

    private function getClassName($category): string
    {
        return match ($category) {
            'браслеты'           => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BraceletProps',
            'броши'              => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BroochProps',
            'зажим для галстука' => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\TieClipProps',
            'запонки'            => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\CuffLinkProps',
            'колье'              => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\NecklaceProps',
            'кольца'             => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\RingProps',
            'пирсинг'            => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\PiercingProps',
            'подвески'           => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\PendantProps',
            'подвески-шарм'      => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\CharmPendantProps',
            'серьги'             => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\EarringProps',
            'цепи'               => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\ChainProps',
            'бусы'               => 'Domain\Jewelleries\JewelleryBuilder\CategoryProps\BeadProps',
        };
    }
}
