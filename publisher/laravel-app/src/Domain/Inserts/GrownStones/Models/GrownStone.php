<?php

namespace Domain\Inserts\GrownStones\Models;

use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrownStone extends Model
{
    protected $table = GrownStoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = GrownStoneEnum::RESOURCE->value;

    public function stoneFamily(): BelongsTo
    {
        return $this->belongsTo(StoneFamily::class);
    }

    public function stone(): BelongsTo
    {
        return $this->hasOne(Stone::class);
    }
}
