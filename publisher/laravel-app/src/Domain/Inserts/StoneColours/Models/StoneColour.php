<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneColours\Models;

use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class StoneColour extends Model
{
    protected $table = StoneColourEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneColourEnum::TYPE_RESOURCE->value;

    public function stoneExteriors(): HasMany
    {
        return $this->hasMany(StoneExterior::class, StoneExteriorEnum::FK_COLOUR->value);
    }
}
