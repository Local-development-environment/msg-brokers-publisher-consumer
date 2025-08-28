<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

final class Colour
{
    public function getColour($properties): string
    {
        $metal = $properties['prcsMetal'];
        $coverages = $properties['prcsMetalCoverage'];

        if ($metal === 'золото' && in_array('родирование', $coverages)) {
            $colour = 'белый';
        }
        elseif ($metal === 'золото' && !in_array('родирование', $coverages)) {
            $colour = $this->randGoldWithProbability(['желтый', 'красный']);
        }
        elseif ($metal === 'серебро' && in_array('родирование', $coverages)) {
            $colour = 'белый';
        }
        elseif ($metal === 'серебро' && in_array('оксидирование', $coverages)) {
            $colour = 'черненый белый';
        }
        elseif ($metal === 'серебро' && in_array('золочение', $coverages)) {
            $colour = 'желтый';
        }
        elseif ($metal === 'платина') {
            $colour = 'белый';
        }
        else {
            $colour = 'белый';
        }

        return $colour;
    }

    private function randGoldWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === 'красный') {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'желтый') {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }
}
