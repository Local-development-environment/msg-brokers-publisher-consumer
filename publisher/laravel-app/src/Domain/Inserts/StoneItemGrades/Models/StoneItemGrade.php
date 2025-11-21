<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneItemGrades\Models;

use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Domain\Inserts\StoneItemGrades\Enums\StoneItemGradeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class StoneItemGrade extends Model
{
    protected $table = StoneItemGradeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneItemGradeEnum::TYPE_RESOURCE->value;

    public function groupGrade(): BelongsTo
    {
        return $this->belongsTo(GroupGrade::class, GroupGradeEnum::PRIMARY_KEY->value);
    }

    public function stoneGrade(): BelongsTo
    {
        return $this->belongsTo(StoneGrade::class);
    }
}
