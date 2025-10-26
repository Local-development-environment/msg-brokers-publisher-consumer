<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertOptionalInfos\Models;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class InsertOptionalInfo extends Model
{
    protected $table = InsertOptionalInfoEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertOptionalInfoEnum::TYPE_RESOURCE->value;

    public function insert(): BelongsTo
    {
        return $this->belongsTo(Insert::class, InsertEnum::PRIMARY_KEY->value);
    }
}
