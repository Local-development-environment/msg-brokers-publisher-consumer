<?php

namespace Domain\Inserts\StoneColours\Models;

use Domain\Inserts\InsertStones\Enums\InsertStoneEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneColour extends Model
{
    protected $table = StoneColourEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneColourEnum::TYPE_RESOURCE->value;

    public function insertStones(): HasMany
    {
        return $this->hasMany(InsertStone::class, InsertStoneEnum::FK_STONE_COLOUR->value);
    }
}
