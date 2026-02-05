<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Enums\JewelleryEnum;

final class JewelleryItem
{
    public function getJewelleryItem($jewelleryData): int
    {
        Schema::disableForeignKeyConstraints();
        DB::table(JewelleryEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        $name = DB::table(JewelleryCategoryEnum::TABLE_NAME->value)->where('id', $jewelleryData->categoryId)->value('name');

        return DB::table(JewelleryEnum::TABLE_NAME->value)->insertGetId([
            'category_id' => $jewelleryData->categoryId,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $jewelleryData->description,
            'part_number' => $jewelleryData->partNumber,
            'is_active' => $jewelleryData->isActive,
            'approx_weight' => $jewelleryData->approxWeight,
            'created_at' => now()
        ]);
    }
}
