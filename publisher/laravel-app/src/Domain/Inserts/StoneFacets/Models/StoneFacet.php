<?php

namespace Domain\Inserts\StoneFacets\Models;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneFacets\Enums\StoneFacetEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoneFacet extends Model
{
    protected $table = StoneFacetEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneFacetEnum::RESOURCE->value;

    public function stoneInserts(): HasMany
    {
        return $this->hasMany(InsertStone::class);
    }
}
