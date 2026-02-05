<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneColours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Enums\StoneColourEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneColour extends Model
{
    protected $table = StoneColourEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneColourEnum::TYPE_RESOURCE->value;

    public function stoneExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class, StoneExteriorEnum::FK_COLOUR->value);
    }
}
