<?php
declare(strict_types=1);

namespace Domain\Inserts\Facets\Models;

use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Facet extends Model
{
    protected $table = FacetEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = FacetEnum::TYPE_RESOURCE->value;

    public function insertExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class, StoneExteriorEnum::FK_FACET->value);
    }
}
