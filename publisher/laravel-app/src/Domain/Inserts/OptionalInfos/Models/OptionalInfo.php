<?php

namespace Domain\Inserts\OptionalInfos\Models;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\OptionalInfos\Enums\OptionalInfoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OptionalInfo extends Model
{
    protected $table = OptionalInfoEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = OptionalInfoEnum::TYPE_RESOURCE->value;

    public function insert(): BelongsTo
    {
        return $this->belongsTo(Insert::class, InsertEnum::PRIMARY_KEY->value);
    }
}
