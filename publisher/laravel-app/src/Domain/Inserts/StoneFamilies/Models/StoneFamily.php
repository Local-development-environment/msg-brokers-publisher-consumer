<?php

namespace Domain\Inserts\StoneFamilies\Models;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneFamily extends Model
{
    protected $table = StoneFamilyEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = StoneFamilyEnum::TYPE_RESOURCE->value;

    public function grownStones(): HasMany
    {
        return $this->hasMany(GrownStone::class);
    }

    public function naturalStones(): HasMany
    {
        return $this->hasMany(NaturalStone::class);
    }
}
