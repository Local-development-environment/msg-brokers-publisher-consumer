<?php
declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Models;

use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Domain\Inserts\StoneItemGrades\Models\StoneItemGrade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class GroupGrade extends Model
{
    protected $table = GroupGradeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = GroupGradeEnum::TYPE_RESOURCE->value;

    public function stoneItemGrade(): BelongsTo
    {
        return $this->belongsTo(StoneItemGrade::class);
    }

    public function stoneGroup(): BelongsTo
    {
        return $this->belongsTo(StoneGroup::class);
    }

    public function naturalStone(): HasOne
    {
        return $this->hasOne(NaturalStone::class, NatureStoneEnum::PRIMARY_KEY->value);
    }
}
