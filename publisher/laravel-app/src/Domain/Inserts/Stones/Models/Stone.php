<?php

namespace Domain\Inserts\Stones\Models;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stone extends Model
{
    protected $table = StoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneEnum::RESOURCE->value;

    public function typeOrigin(): BelongsTo
    {
        return $this->belongsTo(TypeOrigin::class);
    }

    public function imitationStone(): HasOne
    {
        return $this->hasOne(ImitationStone::class);
    }

    public function naturalStone(): HasOne
    {
        return $this->hasOne(NaturalStone::class);
    }

    public function grownStone(): HasOne
    {
        return $this->hasOne(GrownStone::class);
    }
}
