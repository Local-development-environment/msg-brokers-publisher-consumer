<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Enums\StoneItemGradeEnum;

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
