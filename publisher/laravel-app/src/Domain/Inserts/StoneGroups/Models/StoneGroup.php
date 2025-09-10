<?php

namespace Domain\Inserts\StoneGroups\Models;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneGroup extends Model
{
    protected $table = StoneGroupEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneGroupEnum::RESOURCE->value;

    public function naturalStones(): HasMany
    {
        return $this->hasMany(NaturalStone::class);
    }
}
