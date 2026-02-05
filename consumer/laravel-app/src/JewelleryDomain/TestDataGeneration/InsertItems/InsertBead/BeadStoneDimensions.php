<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBead;

use JewelleryDomain\Jewellery\BeadItems\BeadCabochonForm\Enums\BeadCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\BeadItems\BeadCutForm\Enums\BeadCutFormNamesEnum;

final readonly class BeadStoneDimensions
{
    public function __construct()
    {
    }

    public function getDimensions(string $form): array
    {
        return match ($form) {
            BeadCabochonFormNamesEnum::SPHERE_CABOCHON->value,
            BeadCutFormNamesEnum::SPHERE_CUT->value              => $this->getDiameter(),
            BeadCutFormNamesEnum::BRIOLETTE_CUT->value,
            BeadCutFormNamesEnum::BICONE_CUT->value,
            BeadCutFormNamesEnum::XILION_CUT->value,
            BeadCutFormNamesEnum::BAROQUE_CUT->value,
            BeadCutFormNamesEnum::ELLIPSOID_CUT->value,
            BeadCutFormNamesEnum::PYRAMID_CUT->value,
            BeadCabochonFormNamesEnum::ELLIPSOID_CABOCHON->value,
            BeadCabochonFormNamesEnum::RONDEL_CABOCHON->value,
            BeadCabochonFormNamesEnum::BRIOLETTE_CABOCHON->value => $this->getRectangle(),
            BeadCutFormNamesEnum::CUBE_CUT->value                => $this->getSquare(),
            BeadCutFormNamesEnum::BAROQUE_CUT->value             => $this->getNatural(),
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
