<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\InsertItems\InsertBracelet;

use JewelleryDomain\Jewellery\StoneExteriors\StoneCabochonForm\Enums\StoneCabochonFormNamesEnum;
use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;

final class BraceletStoneDimensions
{
    public function __construct()
    {
    }

    public function getDimensions(string $form): array
    {
        return match ($form) {
            StoneCabochonFormNamesEnum::ROUND_CABOCHON->value,
            StoneCutFormNamesEnum::ROUND_CUT->value => $this->getDiameter(),
            StoneCutFormNamesEnum::PEAR_CUT->value,
            StoneCutFormNamesEnum::MARQUISE_CUT->value,
            StoneCutFormNamesEnum::OVAL_CUT->value,
            StoneCutFormNamesEnum::RADIANT_CUT->value,
            StoneCutFormNamesEnum::EMERALD_CUT->value,
            StoneCabochonFormNamesEnum::OVAL_CABOCHON->value,
            StoneCutFormNamesEnum::BAGUETTE_CUT->value => $this->getRectangle(),
            StoneCutFormNamesEnum::CUSHION_CUT->value,
            StoneCutFormNamesEnum::PRINCESS_CUT->value,
            StoneCutFormNamesEnum::ASSCHER_CUT->value,
            StoneCutFormNamesEnum::HEART_CUT->value,
            StoneCutFormNamesEnum::TRILLION_CUT->value => $this->getSquare(),
            StoneCutFormNamesEnum::NATURAL->value      => $this->getNatural(),
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
