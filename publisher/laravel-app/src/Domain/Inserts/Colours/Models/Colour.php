<?php
declare(strict_types=1);

namespace Domain\Inserts\Colours\Models;

use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Colour extends Model
{
    protected $table = ColourEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = ColourEnum::TYPE_RESOURCE->value;

    public function insertExteriors(): HasMany
    {
        return $this->hasMany(InsertExterior::class, InsertExteriorEnum::FK_COLOUR->value);
    }
}
