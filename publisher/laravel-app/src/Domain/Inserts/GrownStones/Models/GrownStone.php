<?php

namespace Domain\Inserts\GrownStones\Models;

use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
//use Domain\Inserts\GrownStones\Policies\GrownStonePolicy;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrownStone extends Model
{
    protected $table = GrownStoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = GrownStoneEnum::TYPE_RESOURCE->value;

    public function stoneFamily(): BelongsTo
    {
        return $this->belongsTo(StoneFamily::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }
}
