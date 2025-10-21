<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\StoneGrades\Enums\StoneGradeListEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeListEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeListEnum;
use Domain\Users\Admins\Models\Admin;
use Domain\Users\Genders\Models\Gender;
use Domain\Users\RegisterPhones\Models\RegisterPhone;
use Domain\Users\Users\Models\User;
use Domain\Users\UserTypes\Models\UserType;
use Domain\Users\UserUserTypes\Models\UserUserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

final class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'Колье золото проба 585  покрытие (эмаль) цвет красный со вставками (цаворит) артикул 42f70891a5c2c02684dl';
        $jewelleryId = DB::table('jewelleries.jewelleries')->insertGetId([
            'category_id' => 8,
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => 'description',
            'part_number' => '42f70891a5c2c02684dl',
            'approx_weight' => 5.5,
            'is_active' => true,
            'created_at' => now(),
        ]);

//        $necklaceId = DB::table('jw_properties.necklaces')->insertGetId([
//            'id' => $jewelleryId,
//            'clasp_id' => 4,
//            'created_at' => now(),
//        ]);
        dd($jewelleryId);
        foreach (RingSizeListEnum::cases() as $grade) {
            dump((float)$grade->value);
        }
        dd(StoneGradeListEnum::cases()[array_rand(StoneGradeListEnum::cases())]->value);
        $params = [
            'include' => ['jewelleryCategory','inserts'],
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
                $include = $keyP . '=' . implode(',',$param);
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
                $sort = $keyP . '=' . implode(',',$param);
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
}
