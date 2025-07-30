<?php

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
