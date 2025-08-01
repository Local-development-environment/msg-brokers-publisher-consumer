<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Illuminate\Support\Facades\DB;

final class PrcsMetal
{
    public function getMetal(): string
    {
        $metals = DB::table('metals.prcs_metals')->get()->pluck('name')->toArray();
        return $this->randWithProbability($metals);
    }

    private function randWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === 'золото') {
                for ($x = 1; $x <= 10; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'серебро') {
                for ($x = 1; $x <= 8; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'платина') {
                for ($x = 1; $x <= 4; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'палладий') {
                for ($x = 1; $x <= 2; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }
}
