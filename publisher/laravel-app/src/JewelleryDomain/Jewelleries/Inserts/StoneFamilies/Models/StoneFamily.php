<?php

namespace JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyEnum;

class StoneFamily extends Model
{
    protected $table = StoneFamilyEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneFamilyEnum::TYPE_RESOURCE->value;

    public function grownStones(): HasMany
    {
        return $this->hasMany(GrownStone::class);
    }

    public function naturalStones(): HasMany
    {
        return $this->hasMany(NaturalStone::class);
    }
}
