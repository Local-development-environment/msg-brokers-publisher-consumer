<?php

namespace Domain\Inserts\Stones\Models;

use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\InsertStones\Enums\InsertStoneEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneEnum;
use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stone extends Model
{
    protected $table = StoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneEnum::TYPE_RESOURCE->value;

    public function typeOrigin(): BelongsTo
    {
        return $this->belongsTo(TypeOrigin::class);
    }

    public function imitationStone(): HasOne
    {
        return $this->hasOne(ImitationStone::class, ImitationStoneEnum::PRIMARY_KEY->value);
    }

    public function naturalStone(): HasOne
    {
        return $this->hasOne(NaturalStone::class, NaturalStoneEnum::PRIMARY_KEY->value);
    }

    public function grownStone(): HasOne
    {
        return $this->hasOne(GrownStone::class, GrownStoneEnum::PRIMARY_KEY->value);
    }

    public function opticalEffectStone(): HasOne
    {
        return $this->hasOne(OpticalEffectStone::class, OpticalEffectStoneEnum::PRIMARY_KEY->value);
    }

    public function insertStones(): HasMany
    {
        return $this->hasMany(GrownStone::class);
    }

    public function stoneFacets(): BelongsToMany
    {
        return $this->belongsToMany(
            StoneFacet::class,
            InsertStoneEnum::TABLE_NAME->value,
            InsertStoneEnum::FK_STONE->value,
            InsertStoneEnum::FK_STONE_FACET->value
        );
    }

    public function stoneColours(): BelongsToMany
    {
        return $this->belongsToMany(
            StoneColour::class,
            InsertStoneEnum::TABLE_NAME->value,
            InsertStoneEnum::FK_STONE->value,
            InsertStoneEnum::FK_STONE_COLOUR->value
        );
    }
}
