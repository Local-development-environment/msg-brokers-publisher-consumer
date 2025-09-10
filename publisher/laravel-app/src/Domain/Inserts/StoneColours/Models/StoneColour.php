<?php

namespace Domain\Inserts\StoneColours\Models;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneColour extends Model
{
    protected $table = StoneColourEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneColourEnum::RESOURCE->value;

    public function stoneInserts(): HasMany
    {
        return $this->hasMany(InsertStone::class);
    }
}
