<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Enums\InsertEnum;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;

final class InsertOptionalInfo extends Model
{
    protected $table = InsertOptionalInfoEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertOptionalInfoEnum::TYPE_RESOURCE->value;

    public function insert(): BelongsTo
    {
        return $this->belongsTo(Insert::class, InsertEnum::PRIMARY_KEY->value);
    }
}
