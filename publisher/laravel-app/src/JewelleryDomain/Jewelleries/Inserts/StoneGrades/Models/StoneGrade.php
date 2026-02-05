<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Models\StoneItemGrade;

final class StoneGrade extends Model
{
    protected $table = StoneGradeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneGradeEnum::TYPE_RESOURCE->value;

    public function stoneItemGrades(): HasMany
    {
        return $this->hasMany(StoneItemGrade::class);
    }
}
