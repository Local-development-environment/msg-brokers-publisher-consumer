<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Models\StoneItemGrade;

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
