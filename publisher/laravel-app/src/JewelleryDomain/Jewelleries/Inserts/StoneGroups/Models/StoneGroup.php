<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupEnum;

final class StoneGroup extends Model
{
    protected $table = StoneGroupEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneGroupEnum::TYPE_RESOURCE->value;

    public function groupGrades(): HasMany
    {
        return $this->hasMany(GroupGrade::class);
    }
}
