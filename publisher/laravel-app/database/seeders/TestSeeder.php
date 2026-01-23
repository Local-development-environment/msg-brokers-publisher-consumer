<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginBuilderEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryGenerator\Traits\StoneExteriorSQL;
use Domain\JewelleryProperties\Bracelets\BodyParts\Models\BodyPart;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspBuilderEnum;
use Domain\JewelleryProperties\Piercings\PiercingTypes\Enums\PiercingTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Domain\PreciousMetals\PreciousMetals\Enums\PreciousMetalBuilderEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class TestSeeder extends Seeder
{
    use ProbabilityArrayElementTrait, StoneExteriorSQL;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dd(PiercingTypeBuilderEnum::BANANA->suitable());
        $inserts = DB::select(file_get_contents(base_path('src/Domain/JewelleryGenerator/Jewelleries/InsertItems/inserts.sql')));

        foreach ($inserts as $insert) {
            dd(json_decode($insert->inserts));
        }
        dd();
        $jewelleries = config('data-seed.insert-seed.stones.carat');
//        dd($jewelleries);
        $stoneMetrics = data_get($jewelleries, '*.*');
        $filteredItems = array_filter($stoneMetrics, function ($value) {
            return $value['carat'] >= 0.3 && $value['carat'] <= 3;
        });
        dd($filteredItems);
        $filteredArray = array_filter($jewelleries, function ($value) {
            dump($value['stoneGrade']);
            return $value['stoneGrade'] === StoneGradeBuilderEnum::SECOND_GRADE->value;
        });
        dd($filteredArray);
//        dd(file_get_contents(base_path('src/Domain/JewelleryGenerator/Jewelleries/InsertItems/exterior.sql')));
//        $file = file_get_contents(base_path('src/Domain/JewelleryGenerator/Jewelleries/InsertItems/exterior.sql'))
//            . 'where c.name = \'черный\' and s.name = \'муассанит\'';
        $natureType = TypeOriginBuilderEnum::NATURE->value;
        $file = file_get_contents(base_path('src/Domain/JewelleryGenerator/Jewelleries/InsertItems/exterior.sql'))
            . "where t.name = '{$natureType}'";
//        dd($file);
        $test = DB::select($file);
        dd(collect($test)->random());
        $bases = BraceletBaseBuilderEnum::cases();
        foreach ($bases as $key => $base) {
            if ($base->value === BraceletBaseBuilderEnum::METAL_CHAIN->value ||
                $base->value === BraceletBaseBuilderEnum::METAL_MONOLITH->value ||
                $base->value === BraceletBaseBuilderEnum::SEGMENTAL_ITEMS->value ||
                $base->value === BraceletBaseBuilderEnum::LEATHER->value) {
                Arr::forget($bases, $key);
            }
            dump($base->value);
        }
        $test = $bases[array_rand($bases)];
        dd($bases);
        dd($test->value);



        $test = DB::select(
            '
                select
                    s.name as stone, c.name as colour, f.name as facet, gg.stone_group_id, sg.name as stone_group_name
                from
                    jw_inserts.stone_exteriors as se
                join jw_inserts.colours c on se.colour_id = c.id
                join jw_inserts.stones s on s.id = se.stone_id
                join jw_inserts.facets f on f.id = se.facet_id
                join jw_inserts.natural_stones ns on s.id = ns.id
                left join jw_inserts.group_grades gg on ns.id = gg.id
                join jw_inserts.stone_groups sg on gg.stone_group_id = sg.id
            '
        );
        foreach ($test as $item) {
            dump($item->stone);
        }
//        dd('ok');
//        dd(collect($test));
        $test = [];

        $jewellery = config('data-seed.insert-seed.stones.jewellery-stones');
        $precious = config('data-seed.insert-seed.stones.precious-stones');
        $jewelleryOrnamental = config('data-seed.insert-seed.stones.jewellery-ornamental-stones');
        $ornamental = config('data-seed.insert-seed.stones.ornamental-stones');
        $carats = config('data-seed.insert-seed.stones.carat');
        foreach (data_get($carats, 'diamondFragments') as $carat) {
            $this->getCarats($carat, ['step' => 0.0005, 'minCarat' => 0.0045, 'maxCarat' => 0.01]);
            dump($carat['diameter']);
        }

        dd(data_get($carats, 'large'));
    }

    private function getCarats(array $carat, array $params): void
    {

//        dump($carat['carat']/$params['step']);
    }
}
