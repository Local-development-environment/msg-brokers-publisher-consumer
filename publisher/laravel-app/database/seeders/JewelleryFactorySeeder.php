<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\JewelleryGenerator\JewelleryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class JewelleryFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        $extract_words_pattern = "/\\b(?:\\w|-)+\\b/u";

//        $products = DB::table('catalog.products as p')
////            ->orderBy('p.id', 'desc')
////            ->take(20)
//            ->select(
//                'p.id as jw_id', 'p.name as jw_name', 'p.summary','p.name_1c','p.external_id',
//                'c.title as cat_name','po.size','po.weight','po.id as po_id',
//
//            )
//            ->join('catalog.product_categories as pc', 'p.id', '=', 'pc.product_id')
//            ->join('catalog.categories as c', 'pc.category_id', '=', 'c.id')
//            ->rightJoin('catalog.product_offers as po', 'p.id', '=', 'po.product_id')
//            ->where('c.id', '=', 4)
//            ->whereBetween('p.id', [1, 1000])
//            ->groupBy('p.id','c.title')
//            ->get()
//        ;
        $products = DB::connection('pgsql_v')->table('catalog.v_products')
            ->where('c_id', '=', 4)
            ->take(50)
            ->get();
        dd($products);
        foreach ($products as $product) {
            $string_to_match = $product->features;
            preg_match_all($extract_words_pattern, $string_to_match, $matches);
            dump(json_decode($product->features));
        }

        $factory = new JewelleryFactory();
        dd('stop');
        dd($products);
        $bracelet = $factory->createJewellery('braceletц');

        dd($bracelet->createJewellery());
    }
}
