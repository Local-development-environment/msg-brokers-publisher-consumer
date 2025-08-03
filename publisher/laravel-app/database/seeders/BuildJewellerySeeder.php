<?php

namespace Database\Seeders;

use Domain\Jewelleries\JewelleryBuilder\BaseJewelleryBuilder;
use Domain\Jewelleries\JewelleryBuilder\Jeweller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildJewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jeweller = new Jeweller();
//        $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        dump([$builder]);
        for ($i = 0; $i < 10000; $i++) {
            dump($i);
            $jeweller->buildJewellery(new BaseJewelleryBuilder());
        }
    }
}
