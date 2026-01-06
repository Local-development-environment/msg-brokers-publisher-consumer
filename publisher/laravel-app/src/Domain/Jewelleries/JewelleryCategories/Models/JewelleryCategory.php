<?php
declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryCategories\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class JewelleryCategory extends Model
{
    protected $table = JewelleryCategoryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = JewelleryCategoryEnum::TYPE_RESOURCE->value;

    public function jewelleries(): HasMany
    {
        return $this->hasMany(Jewellery::class);
    }
}
