<?php

namespace Domain\Inserts\NaturalStoneGrades\Models;

use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NaturalStoneGrade extends Model
{
    protected $table = NaturalStoneGradeEnum::TABLE->value;

    public const string TYPE_RESOURCE = NaturalStoneGradeEnum::RESOURCE->value;

    public function stoneGrade(): BelongsTo
    {
        return $this->belongsTo(StoneGrade::class);
    }

    public function naturalStone(): BelongsTo
    {
        return $this->belongsTo(NaturalStone::class);
    }
}
