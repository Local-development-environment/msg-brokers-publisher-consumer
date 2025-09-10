<?php

namespace Domain\Inserts\StoneFamilies\Models;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneFamilies\Enums\StoneGroupEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneFamily extends Model
{
    protected $table = StoneGroupEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneGroupEnum::RESOURCE->value;

    public function grownStones(): HasMany
    {
        return $this->belongsTo(GrownStone::class);
    }

    public function naturalStones(): HasMany
    {
        return $this->belongsTo(NaturalStone::class);
    }
}
