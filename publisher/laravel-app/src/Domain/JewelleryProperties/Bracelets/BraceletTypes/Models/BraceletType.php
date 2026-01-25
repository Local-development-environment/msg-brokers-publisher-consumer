<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletTypes\Models;

use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BraceletType extends Model
{
    protected $table = BraceletTypeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletTypeEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }
}
