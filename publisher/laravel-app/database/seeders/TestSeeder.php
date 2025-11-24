<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeListEnum;
use Domain\PreciousMetals\Coverages\Enums\CoverageBuilderEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

final class TestSeeder extends Seeder
{
    use ProbabilityArrayElementTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = [];
        $test[] = config('data-seed.insert-seed.stones.jewellery_stones');
        $test[] = config('data-seed.insert-seed.stones.precious_stones');
        dd($test);
        for ($i = 0; $i < 30; ++$i) {
            $keyFunction = array_rand(CoverageBuilderEnum::cases());
            dump(CoverageBuilderEnum::cases()[$keyFunction]->value);
        }
        dd('ok');
        $keyFunction = array_rand(CoveringFunctionBuilderEnum::cases());
        $function = CoveringFunctionBuilderEnum::cases()[$keyFunction];
//        $combProbability = random_int(1, 100);
        $arrCoverings = explode(',', $function->coverings());

        $keyCovering = array_rand($arrCoverings);
        dd($arrCoverings[$keyCovering]);

        $enumClass = get_class(CoveringFunctionBuilderEnum::PROTECTIVE);
        $enumCases = CoveringFunctionBuilderEnum::cases();

        $function = $this->getArrElement($enumClass, $enumCases);
        dd($this->getArrElement($enumClass, $enumCases));

        foreach ($arrFunctions as $key => $case) {

            if (str_contains($case->value, 'розовый')) {
                Arr::forget($arrColours, $key);
            }
//            dump($arrColours);
//            $count = count(explode(",", $hallmark->metals()));
//            list($one, $two, $three) = explode(",", $hallmark->metals(), $number);
//            dd($one, $two);

//            list($one, $two, $three) = explode("-", "44-xkIolspO", 2);
//            if (count(explode(",", $hallmark->metals())) > 1) {
//                list($one, $two) = explode(",", $hallmark->metals(), $count);
//                dump(count(explode(",", $hallmark->metals(), 2)));
//            }
//            dump($hallmark->metals());
        }

//        if ($combProbability < 90) {
//            dump(['red']);
//        } elseif ($combProbability < 95) {
//            dump(['red', 'white']);
//        } else {
//            dump(['red', 'white','yellow']);
//        }
//        dump($arrColours);
        dd('ok');
//        $enumClass = get_class(HallmarkBuilderEnum::H_375);
//        $enumCases = HallmarkBuilderEnum::cases();
//
//        foreach ($enumCases as $key => $case) {
//            if (! str_contains($case::{$case->name}->metals(), 'серебро')) {
//                Arr::forget($enumCases, $key);
//            }
//            dump($case::{$case->name}->metals());
//        }
//        dd($enumCases);
//        dd($this->getArrElement($enumClass, $enumCases));

        $categories = CategoryBuilderEnum::cases();
        $i = 0;
//        for ($x = 1; $x <= 200; $x++) {
//            $key = $this->rand_with_entries($enumClass, $enumCases);
//            if ($key === 'броши') {
//                dump($key . '  ' . $i++);
//            }
////            dump($this->rand_with_entries($categories));
//        }
//        $this->rand_with_entries($categories);
        dd('ok');
        foreach (Chain::first()->weavings as $size) {
            dump($size->name);
        }
        dd('ok');
        dd(Chain::first()->neckSizes);
        dd(array_rand($arr, 5));
        dd(WeavingBuilderEnum::BYZANTINE->altNames());

        foreach (RingSizeListEnum::cases() as $grade) {
            dump((float)$grade->value);
        }
        dd(StoneGradeBuilderEnum::cases()[array_rand(StoneGradeBuilderEnum::cases())]->value);
        $params = [
            'include' => ['jewelleryCategory', 'inserts'],
            'filter' => [
                'part_number' => '1050166-3',
                'id' => 1
            ],
            'sort' => [],
            'fields' => [
                'jewelleries' => [
                    ''
                ]
            ]
        ];
        $strParams = '?';
        foreach ($params as $keyP => $param) {
            if ($keyP === 'include') {
                $include = $keyP . '=' . implode(',', $param);
                if (!empty($param)) {
                    $strParams .= $include . '&';
                }

            } elseif ($keyP === 'filter') {
                foreach ($param as $keyF => $value) {
                    $filter[] = $keyP . '[' . $keyF . ']' . '=' . $value;
                }
                if (!empty($filter)) {
                    $strParams .= implode(',', $filter) . '&';
                }

            } elseif ($keyP === 'sort') {
                $sort = $keyP . '=' . implode(',', $param);
                if (!empty($param)) {
                    $strParams .= $sort . '&';
                }
            } elseif ($keyP === 'fields') {

            } else {
                $strParams = '';
            }

        }
//        $include = 'include=' . implode(',',$params['include']);
//        dd($filter);
//        $strParam = '?' . $include . '&' . implode('&', $filter) . '&' . $sort;
//        [$keys, $values] = Arr::divide($param);
//        foreach ($keys as $key) {
//            if ($key === 'include') {
//                dump($param[$key]);
//            }
//        }
//        dd($strParams);
        $connector = new UVIConnector();
//        $response = $connector->send(new GetAllJewelleries('include=jewelleryCategory,inserts&filter[part_number]=1050166-3'));
        $response = $connector->send(new GetAllJewelleries($strParams));

        dd($response->json());
    }

    /**
     * @throws BindingResolutionException
     */
    private function rand_with_entries(string $enumClass, array $enumCases)
    {
        //create a temporary array
        $tmp = [];

        //loop through all names
        foreach ($this->getArrItems($enumClass, $enumCases) as $name => $count) {
            //for each entry for a specific name, add name to `$tmp` array
            for ($x = 1; $x <= $count * 100; $x++) {
                $tmp[] = $name;
            }
        }
        //return random name from `$tmp` array
        return $tmp[array_rand($tmp)];
    }

    protected function getTotalItems(string $data): float
    {
        $num = 0;
        foreach ($data as $item) {
            $num += CategoryBuilderEnum::{$item->name}->jwProbability();
        }

        return 100 / $num;
    }

    protected function getArrItems(string $enumClass, array $enumCases): array
    {
        $arrItems = [];
        foreach ($enumCases as $item) {
            $arrItems[$enumClass::{$item->name}->value] = $enumClass::{$item->name}->jwProbability();
        }

        return $arrItems;
    }
}
