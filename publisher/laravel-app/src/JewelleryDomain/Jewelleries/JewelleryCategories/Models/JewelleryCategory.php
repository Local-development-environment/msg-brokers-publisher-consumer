<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryCategories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;

final class JewelleryCategory extends Model
{
    protected $table = JewelleryCategoryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = JewelleryCategoryEnum::TYPE_RESOURCE->value;

    public function jewelleries(): HasMany
    {
        return $this->hasMany(Jewellery::class);
    }
}
