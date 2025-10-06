<?php

namespace Domain\Inserts\StoneGrades\Models;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoneGrade extends Model
{
    protected $table = StoneGradeEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = StoneGradeEnum::TYPE_RESOURCE->value;

    public function naturalStoneGrades(): HasMany
    {
        return $this->hasMany(NaturalStoneGrade::class);
    }
}
