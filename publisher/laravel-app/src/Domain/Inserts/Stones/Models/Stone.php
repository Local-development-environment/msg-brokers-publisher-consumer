<?php
declare(strict_types=1);

namespace Domain\Inserts\Stones\Models;

use Domain\Inserts\Colours\Models\Colour;
use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\OpticalEffectStones\Enums\StoneOpticalEffectEnum;
use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function insertStones(): HasMany
    {
        return $this->hasMany(GrownStone::class);
    }

    public function stoneExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class);
    }

    public function stoneFacets(): BelongsToMany
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
            Colour::class,
            StoneExteriorEnum::TABLE_NAME->value,
            StoneExteriorEnum::FK_STONE->value,
            StoneExteriorEnum::FK_COLOUR->value
        );
    }
}
