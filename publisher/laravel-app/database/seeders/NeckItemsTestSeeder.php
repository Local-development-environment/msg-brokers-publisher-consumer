<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Jewelleries\Categories\Enums\CategoryListEnum;
use Domain\Jewelleries\JewelleryBuilder\BaseJewelleryBuilder;
use Domain\Jewelleries\JewelleryBuilder\Jeweller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class NeckItemsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jeweller = new Jeweller();
        $categories = [1, 4, 8];
        $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//        dump([$builder]);
//        foreach ($categories as $key => $category) {
//            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());
//
//            $this->addJewellery($builder, $category);
//        }
        for ($i = 0; $i < 30; $i++) {
            dump($i);
            $builder = $jeweller->buildJewellery(new BaseJewelleryBuilder());

            $this->addJewellery($builder);
//            dd($builder);
        }

//        $name = 'Колье золото проба 585  покрытие (эмаль) цвет красный со вставками (цаворит) артикул 42f70891a5c2c02684dl';


    }

    private function addJewellery(array $jewelleryData): void
    {
//        dump($jewelleryData);
        $categories = [
            CategoryListEnum::BEADS->value => 1,
            CategoryListEnum::CHAINS->value => 4,
            CategoryListEnum::NECKLACES->value => 8,
        ];

        if ($jewelleryData['jw_category'] === CategoryListEnum::BEADS->value) {
            $this->addNeckItem($jewelleryData, $categories[CategoryListEnum::BEADS->value]);
        }

        if ($jewelleryData['jw_category'] === CategoryListEnum::CHAINS->value) {
            $this->addNeckItem($jewelleryData, $categories[CategoryListEnum::CHAINS->value]);
        }

        if ($jewelleryData['jw_category'] === CategoryListEnum::NECKLACES->value) {
            $this->addNeckItem($jewelleryData, $categories[CategoryListEnum::NECKLACES->value]);
        }


//        dd($categories);

    }

    private function addNeckItem(array $jewelleryData, $categoryId): void
    {
        $jewelleryId = DB::table('jewelleries.jewelleries')->insertGetId([
            'category_id' => $categoryId,
            'name' => $jewelleryData['name'],
            'slug' => Str::slug($jewelleryData['name'], '-'),
            'description' => $jewelleryData['description'],
            'part_number' => $jewelleryData['part_number'],
            'approx_weight' => $jewelleryData['approx_weight'],
            'is_active' => true,
            'created_at' => now(),
        ]);
    }
}
