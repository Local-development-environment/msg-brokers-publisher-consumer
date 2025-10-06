<?php

namespace Domain\Inserts\InsertStones\Models;

use Domain\Inserts\InsertStones\Enums\InsertStoneEnum;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InsertStone extends Model
{
    protected $table = InsertStoneEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = InsertStoneEnum::TYPE_RESOURCE->value;

    public function inserts(): HasMany
    {
        return $this->hasMany(Insert::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }

    public function stoneColour(): BelongsTo
    {
        return $this->belongsTo(StoneColour::class, InsertStoneEnum::FK_STONE_COLOUR->value);
    }

    public function stoneFacet(): BelongsTo
    {
        return $this->belongsTo(StoneFacet::class, InsertStoneEnum::FK_STONE_FACET->value);
    }
}
