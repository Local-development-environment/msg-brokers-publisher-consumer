<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;
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
        $builder = new Jeweller();

        dd($builder->buildJewellery(new BaseJewelleryGenerator()));
    }
}
