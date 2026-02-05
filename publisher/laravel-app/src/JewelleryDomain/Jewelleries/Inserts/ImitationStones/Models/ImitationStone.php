<?php

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

class ImitationStone extends Model
{
    protected $table = ImitationStoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = ImitationStoneEnum::TYPE_RESOURCE->value;

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class, StoneEnum::PRIMARY_KEY->value);
    }
}
