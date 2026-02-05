<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Enums\InsertEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;

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
