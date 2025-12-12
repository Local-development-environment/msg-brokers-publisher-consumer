<?php
declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Models;

use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class GroupGrade extends Model
{
    protected $table = GroupGradeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = GroupGradeEnum::TYPE_RESOURCE->value;

    public function stoneGrade(): BelongsTo
    {
        return $this->belongsTo(StoneGrade::class);
    }

    public function stoneGrope(): BelongsTo
    {
        return $this->belongsTo(StoneGrade::class);
    }

    public function naturalStone(): BelongsTo
    {
        return $this->belongsTo(NaturalStone::class, NatureStoneEnum::PRIMARY_KEY->value);
    }
}
