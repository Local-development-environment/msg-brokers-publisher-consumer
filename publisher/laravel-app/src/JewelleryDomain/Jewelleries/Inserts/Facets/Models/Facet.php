<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Facets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;

final class Facet extends Model
{
    protected $table = FacetEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = FacetEnum::TYPE_RESOURCE->value;

    public function insertExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class, StoneExteriorEnum::FK_FACET->value);
    }
}
