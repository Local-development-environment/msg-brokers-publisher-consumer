<?php

namespace Domain\Inserts\StoneFacets\Models;

use Domain\Inserts\InsertStones\Enums\InsertStoneEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneFacets\Enums\StoneFacetEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneFacet extends Model
{
    protected $table = StoneFacetEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = StoneFacetEnum::TYPE_RESOURCE->value;

    public function insertStones(): HasMany
    {
        return $this->hasMany(InsertStone::class, InsertStoneEnum::FK_STONE_FACET->value);
    }
}
