<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Models;

use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Insert extends Model
{
    protected $table = InsertEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function insertOptionalInfo(): HasOne
    {
        return $this->hasOne(InsertOptionalInfo::class, InsertOptionalInfoEnum::PRIMARY_KEY->value);
    }

    public function stoneExterior(): BelongsTo
    {
        return $this->belongsTo(StoneExterior::class);
    }
}
