<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeListEnum;
use Domain\Inserts\Stones\Models\Stone;
use Domain\Jewelleries\Categories\Enums\CategoryListEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryGenerator\Traits\ProbabilityArrayElementTrait;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeListEnum;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerListEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeListEnum;
use Domain\PreciousMetals\Hallmarks\Enums\HallmarkListEnum;
use Domain\PreciousMetals\MetalColours\Enums\GoldenColourListEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingListEnum;
use Domain\Users\Admins\Models\Admin;
use Domain\Users\Genders\Models\Gender;
use Domain\Users\RegisterPhones\Models\RegisterPhone;
use Domain\Users\Users\Models\User;
use Domain\Users\UserTypes\Models\UserType;
use Domain\Users\UserUserTypes\Models\UserUserType;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

final class TestSeeder extends Seeder
{
    use ProbabilityArrayElementTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrColours = GoldenColourListEnum::cases();
        $combProbability = random_int(1, 100);
        dump($combProbability);

        foreach ($arrColours as $key => $case) {

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

        if ($combProbability < 90) {
            dump(['red']);
        } elseif ($combProbability < 95) {
            dump(['red', 'white']);
        } else {
            dump(['red', 'white','yellow']);
        }
//        dump($arrColours);
        dd('ok');
//        $enumClass = get_class(HallmarkListEnum::H_375);
//        $enumCases = HallmarkListEnum::cases();
//
//        foreach ($enumCases as $key => $case) {
//            if (! str_contains($case::{$case->name}->metals(), 'серебро')) {
//                Arr::forget($enumCases, $key);
//            }
//            dump($case::{$case->name}->metals());
//        }
//        dd($enumCases);
//        dd($this->getArrElement($enumClass, $enumCases));

        $categories = CategoryListEnum::cases();
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
        dd(WeavingListEnum::BYZANTINE->altNames());

        foreach (RingSizeListEnum::cases() as $grade) {
            dump((float)$grade->value);
        }
        dd(StoneGradeListEnum::cases()[array_rand(StoneGradeListEnum::cases())]->value);
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
            $num += CategoryListEnum::{$item->name}->probability();
        }

        return 100 / $num;
    }

    protected function getArrItems(string $enumClass, array $enumCases): array
    {
        $arrItems = [];
        foreach ($enumCases as $item) {
            $arrItems[$enumClass::{$item->name}->value] = $enumClass::{$item->name}->probability();
        }

        return $arrItems;
    }
}
