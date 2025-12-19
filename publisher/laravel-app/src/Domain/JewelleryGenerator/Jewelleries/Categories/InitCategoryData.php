<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator\Jewelleries\Categories;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Domain\Jewelleries\Categories\Enums\CategoryEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

final class InitCategoryData
{
 public function __invoke(): void
 {
     Schema::disableForeignKeyConstraints();
     DB::table(CategoryEnum::TABLE_NAME->value)->truncate();
     Schema::enableForeignKeyConstraints();

     foreach (CategoryBuilderEnum::cases() as $case) {
         DB::table(CategoryEnum::TABLE_NAME->value)->insert([
             'name' => $case->value,
             'slug' => Str::slug($case->value),
             'description' => $case->description(),
             'created_at' => now(),
         ]);
     }
 }
}