<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Beads\BeadBase\Enums\BeadBaseNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Bracelets\BraceletType\Enums\BraceletTypeNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSpecific\Enums\RingSpecificNamesEnum;
use JewelleryDomain\TestDataGeneration\BaseJewelleryGenerator;
use JewelleryDomain\TestDataGeneration\Jeweller;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;

class JewelleryGeneratorTestSeeder extends Seeder
{
    use RandomArrayElementWithProbabilityTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        dd(rand(5, 10));
        $builder = new Jeweller();
        for ($i = 1; $i <= 2000; $i++) {
            $test = $builder->buildJewellery(new BaseJewelleryGenerator());
            if ($test['jewelleryCategory'] === JewelleryCategoryNamesEnum::BRACELETS->value) {
//                if (in_array(RingSpecificNamesEnum::COMBINATION->value, $test['specProperties']['ringSpecific'])) {
//                    dd($test);
//                }

//                if (in_array(BeadBaseNamesEnum::B->value, $test['specProperties']['ringSpecific'])) {
//                    dd($test);
//                }
                dd($test);
//
//                if (BraceletTypeNamesEnum::WICKER->value === $test['specProperties']['braceletType']) {
//                    dump($test);
//                }
            }
        }
        dd($builder->buildJewellery(new BaseJewelleryGenerator()));
    }
}
