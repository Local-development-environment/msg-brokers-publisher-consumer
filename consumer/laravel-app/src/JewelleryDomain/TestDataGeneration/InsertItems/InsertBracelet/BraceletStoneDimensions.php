<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet;

use JewelleryDomain\Jewellery\StoneExteriors\Facet\Enums\FacetNamesEnum;

final class BraceletStoneDimensions
{
    public function __construct()
    {
    }

    public function getDimensions(string $form): array
    {
        return match ($form) {
            FacetNamesEnum::CABOCHON_ROUND->value,
            FacetNamesEnum::ROUND_CUT->value,
            FacetNamesEnum::ROSE_CUT->value     => $this->getDiameter(),
            FacetNamesEnum::PEAR_CUT->value,
            FacetNamesEnum::MARQUISE_CUT->value,
            FacetNamesEnum::OVAL_CUT->value,
            FacetNamesEnum::RADIANT_CUT->value,
            FacetNamesEnum::EMERALD_CUT->value,
            FacetNamesEnum::CABOCHON_OVAL->value,
            FacetNamesEnum::BAGUETTE_CUT->value => $this->getRectangle(),
            FacetNamesEnum::CUSHION_CUT->value,
            FacetNamesEnum::PRINCESS_CUT->value,
            FacetNamesEnum::ASSCHER_CUT->value,
            FacetNamesEnum::HEART_CUT->value,
            FacetNamesEnum::TRILLION_CUT->value => $this->getSquare(),
            FacetNamesEnum::NATURAL->value      => $this->getNatural(),
        };
    }

    private function getDiameter(): array
    {
        return ['diameter' => rand(5, 15)];
    }

    private function getSquare(): array
    {
        $height = rand(7, 15);
        return ['height' => $height, 'width' => $height];
    }

    private function getRectangle(): array
    {
        $height = rand(7, 15);
        return ['height' => $height, 'width' => $height * rand(5, 8) * 0.1];
    }

    private function getNatural(): array
    {
        return ['height' => rand(7, 15), 'width' => rand(7, 15)];
    }
}
