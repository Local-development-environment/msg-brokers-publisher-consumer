<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Enums\GrownStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Models\StoneColour;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Models\TypeOrigin;

final class Stone extends Model
{
    protected $table = StoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneEnum::TYPE_RESOURCE->value;

    public function typeOrigin(): BelongsTo
    {
        return $this->belongsTo(TypeOrigin::class);
    }

    public function imitationStone(): HasOne
    {
        return $this->hasOne(ImitationStone::class, ImitationStoneEnum::PRIMARY_KEY->value);
    }

    public function naturalStone(): HasOne
    {
        return $this->hasOne(NaturalStone::class, NatureStoneEnum::PRIMARY_KEY->value);
    }

    public function grownStone(): HasOne
    {
        return $this->hasOne(GrownStone::class, GrownStoneEnum::PRIMARY_KEY->value);
    }

    public function stoneOpticalEffect(): HasOne
    {
        return $this->hasOne(StoneOpticalEffect::class, StoneOpticalEffectEnum::PRIMARY_KEY->value);
    }

    public function stoneExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class);
    }

    public function facets(): BelongsToMany
    {
        return $this->belongsToMany(
            Facet::class,
            StoneExteriorEnum::TABLE_NAME->value,
            StoneExteriorEnum::FK_STONE->value,
            StoneExteriorEnum::FK_FACET->value
        );
    }

    public function stoneColours(): BelongsToMany
    {
        return $this->belongsToMany(
            StoneColour::class,
            StoneExteriorEnum::TABLE_NAME->value,
            StoneExteriorEnum::FK_STONE->value,
            StoneExteriorEnum::FK_COLOUR->value
        );
    }
}
