<?php

namespace Domain\Inserts\ImitationStones\Models;

use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImitationStone extends Model
{
    protected $table = ImitationStoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = ImitationStoneEnum::TYPE_RESOURCE->value;

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }
}
