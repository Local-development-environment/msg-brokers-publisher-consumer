<?php

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

class NaturalStone extends Model
{
    protected $table = NatureStoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = NatureStoneEnum::TYPE_RESOURCE->value;

    public function stoneFamily(): BelongsTo
    {
        return $this->belongsTo(StoneFamily::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class, StoneEnum::PRIMARY_KEY->value);
    }

    public function naturalStoneGrade(): HasOne
    {
        return $this->hasOne(GroupGrade::class, GroupGradeEnum::PRIMARY_KEY->value);
    }

    public function stoneGroup(): BelongsTo
    {
        return $this->BelongsTo(StoneGroup::class);
    }
}
