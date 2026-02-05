<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JewelleryDomain\Jewellery\Stones\Stone\Enums\StoneNamesEnum;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $this->testArrayProbability();

        $array = StoneNamesEnum::cases();
        foreach ($array as $key => $value) {
            if (count($value->stoneColours()) === 0) {
                dump($value->stoneColours());
            }
        }
        dd('ok');
    }

    private function testArrayProbability(): void
    {
        $arrayProbabilities = [];
        $colours = StoneNamesEnum::DIAMOND->stoneColours();
//        dd($colours);
        foreach ($colours as $colour) {
//            dump($colour);
            for ($i = 0; $i < $colour[1]; $i++) {
                $arrayProbabilities[] = $colour[0];
            }
        }
        shuffle($arrayProbabilities);
        dd($arrayProbabilities[array_rand($arrayProbabilities)]);
    }
}
