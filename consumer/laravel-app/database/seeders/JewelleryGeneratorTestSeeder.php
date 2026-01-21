<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
//        $enumClass = get_class(JewelleryCategoryNamesEnum::BEADS);
//        $enumCases = JewelleryCategoryNamesEnum::cases();
//        $array = json_decode((string) json_encode(NeckSizeValuesEnum::cases()), true);
//        dd($array);
        $builder = new Jeweller();

        dd($builder->buildJewellery(new BaseJewelleryGenerator()));
    }
}
