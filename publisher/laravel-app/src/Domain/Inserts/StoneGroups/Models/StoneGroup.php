<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Models;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class StoneGroup extends Model
{
    protected $table = StoneGroupEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneGroupEnum::TYPE_RESOURCE->value;

    public function groupGrades(): HasMany
    {
        return $this->hasMany(GroupGrade::class);
    }
}
