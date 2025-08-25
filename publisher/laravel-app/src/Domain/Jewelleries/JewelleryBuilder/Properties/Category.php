<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder\Properties;

use Illuminate\Support\Facades\DB;

final class Category
{
    public function getCategory(): string
    {
        return DB::table('jewelleries.categories')->get()->random()->name;
    }
}
