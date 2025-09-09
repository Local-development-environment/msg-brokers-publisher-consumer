<?php

namespace Domain\Inserts\TypeOrigins\Models;

use Domain\Inserts\Stones\Models\Stone;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeOrigin extends Model
{
    protected $table = TypeOriginEnum::TABLE->value;

    public const string TYPE_RESOURCE = TypeOriginEnum::RESOURCE->value;

    public function stones(): HasMany
    {
        return $this->hasMany(Stone::class);
    }
}
