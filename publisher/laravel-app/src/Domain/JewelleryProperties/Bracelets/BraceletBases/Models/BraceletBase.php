<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Models;

use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BraceletBase extends Model
{
    protected $table = BraceletBaseEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletBaseEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }
}
