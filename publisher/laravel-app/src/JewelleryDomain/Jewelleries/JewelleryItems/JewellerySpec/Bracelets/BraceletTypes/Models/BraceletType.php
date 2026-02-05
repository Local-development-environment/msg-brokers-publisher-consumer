<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;

final class BraceletType extends Model
{
    protected $table = BraceletTypeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletTypeEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }
}
