<?php

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Enums\GrownStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

//use Domain\Inserts\GrownStones\Policies\GrownStonePolicy;

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
        return $this->belongsTo(Stone::class, StoneEnum::PRIMARY_KEY->value);
    }
}
