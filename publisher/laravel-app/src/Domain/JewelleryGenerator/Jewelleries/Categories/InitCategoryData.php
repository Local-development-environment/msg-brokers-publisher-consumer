<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Categories;

use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryBuilderEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitCategoryData
{
 public function __invoke(): void
 {
     Schema::disableForeignKeyConstraints();
     DB::table(JewelleryCategoryEnum::TABLE_NAME->value)->truncate();
     Schema::enableForeignKeyConstraints();

     foreach (JewelleryCategoryBuilderEnum::cases() as $case) {
         DB::table(JewelleryCategoryEnum::TABLE_NAME->value)->insert([
             'name' => $case->value,
             'slug' => Str::slug($case->value),
             'description' => $case->description(),
             'created_at' => now(),
         ]);
     }
 }
}
