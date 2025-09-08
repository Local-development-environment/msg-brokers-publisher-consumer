<?php

namespace Domain\Inserts\Stones\Models;

use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stone extends Model
{
    protected $table = StoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneEnum::TYPE_RESOURCE->value;

    public function typeOrigin(): BelongsTo
    {
        return $this->belongsTo(TypeOrigin::class);
    }
}
