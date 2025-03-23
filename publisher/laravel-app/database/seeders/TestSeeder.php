<?php

namespace Database\Seeders;

use App\Http\Integrations\UVI\Jewelleries\Requests\GetAllJewelleries;
use App\Http\Integrations\UVI\UVIConnector;
use Illuminate\Database\Seeder;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $connector = new UVIConnector();
//        dd($connector);
        try {
            dd(json_decode($connector
                ->send(new GetAllJewelleries('include=jewelleryCategory,inserts&filter[part_number]=1050166-3'))->body()));
        } catch (FatalRequestException $e) {
            dump($e);
        } catch (RequestException $e1) {
            dump($e1);
        }
    }
}
