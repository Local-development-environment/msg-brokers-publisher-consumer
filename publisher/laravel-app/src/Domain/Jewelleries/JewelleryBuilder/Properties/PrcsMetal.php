<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Illuminate\Support\Facades\DB;

final class PrcsMetal
{
    public function getMetal(): string
    {
        $metals = DB::table('jw_metals.metals')->get()->pluck('name')->toArray();
        return $this->randWithProbability($metals);
    }

    private function randWithProbability($entries) {

        $tmp = [];

        foreach($entries as $entry) {
            if ($entry === 'золото') {
                for ($x = 1; $x <= 50; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'серебро') {
                for ($x = 1; $x <= 35; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'платина') {
                for ($x = 1; $x <= 10; $x++) {
                    $tmp[] = $entry;
                }
            }

            if ($entry === 'палладий') {
                for ($x = 1; $x <= 5; $x++) {
                    $tmp[] = $entry;
                }
            }
        }

        return $tmp[array_rand($tmp)];
    }
}
