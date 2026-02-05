<?php

namespace JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Enums\TypeOriginEnum;

class TypeOrigin extends Model
{
    protected $table = TypeOriginEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = TypeOriginEnum::TYPE_RESOURCE->value;

    public function stones(): HasMany
    {
        return $this->hasMany(Stone::class);
    }
}
