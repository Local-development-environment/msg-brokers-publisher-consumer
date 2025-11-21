<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Models;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class StoneGrade extends Model
{
    protected $table = StoneGradeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneGradeEnum::TYPE_RESOURCE->value;

    public function groupGrade(): HasOne
    {
        return $this->hasOne(GroupGrade::class);
    }
}
