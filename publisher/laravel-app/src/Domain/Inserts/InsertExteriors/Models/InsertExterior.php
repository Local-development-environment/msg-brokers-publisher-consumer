<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Models;

use Domain\Inserts\Colours\Models\Colour;
use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class InsertExterior extends Model
{
    protected $table = InsertExteriorEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertExteriorEnum::TYPE_RESOURCE->value;

    public function inserts(): HasMany
    {
        return $this->hasMany(Insert::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }

    public function insertColour(): BelongsTo
    {
        return $this->belongsTo(Colour::class, InsertExteriorEnum::FK_COLOUR->value);
    }

    public function facet(): BelongsTo
    {
        return $this->belongsTo(Facet::class, InsertExteriorEnum::FK_FACET->value);
    }
}
