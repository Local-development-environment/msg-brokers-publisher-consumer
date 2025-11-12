<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

final class JewelleryName
{
    public function getJewelleryName(array $properties): string
    {
        if (empty($properties['covering_type'])) {
            $coverage = 'без покрытия';
        } else {
            $stringCoverage = implode(' ', $properties['covering_type']);
            $coverage = "покрытие ($stringCoverage)";
        }

        if (empty($properties['insert'])) {
            $inserts = 'без вставок';
        } else {
            $stones = [];
            foreach ($properties['insert'] as $insert) {
                $stones[] = $insert['stone'];
            }

            $stringInserts = implode(' ', array_unique($stones));
            $inserts = "со вставками ($stringInserts)";
        }

        return mb_ucfirst($properties['category']) . ' ' . $properties['prcsMetal'] .
            ' проба ' . $properties['prcsMetalHallmark'] . ' ' . ' ' . $coverage . ' цвет ' .
            $properties['prcsMetalColour'] . ' ' . $inserts . ' артикул ' . $properties['partNumber'] ;
    }
}
