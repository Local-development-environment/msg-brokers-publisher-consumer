<?php
declare(strict_types=1);

namespace Domain\Inserts\Colours\Models;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\StoneExteriours\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Colour extends Model
{
    protected $table = ColourEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = ColourEnum::TYPE_RESOURCE->value;

    public function insertExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class, StoneExteriorEnum::FK_COLOUR->value);
    }
}
