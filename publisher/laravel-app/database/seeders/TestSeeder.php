<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Domain\Inserts\Facets\Enums\FacetBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseBuilderEnum;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

final class TestSeeder extends Seeder
{
    use ProbabilityArrayElementTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
