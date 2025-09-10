<?php

namespace Domain\Inserts\NaturalStones\Models;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneEnum;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NaturalStone extends Model
{
    protected $table = NaturalStoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = NaturalStoneEnum::RESOURCE->value;

    public function stoneFamily(): BelongsTo
    {
        return $this->belongsTo(StoneFamily::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }

    public function naturalStoneGrade(): HasOne
    {
        return $this->hasOne(NaturalStoneGrade::class);
    }

    public function stoneGroup(): BelongsTo
    {
        return $this->BelongsTo(StoneGroup::class);
    }
}
