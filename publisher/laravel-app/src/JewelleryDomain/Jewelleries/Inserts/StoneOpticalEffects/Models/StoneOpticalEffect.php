<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Models\OpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneOpticalEffect extends Model
{
    protected $table = StoneOpticalEffectEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneOpticalEffectEnum::TYPE_RESOURCE->value;

    public function opticalEffect(): BelongsTo
    {
        return $this->belongsTo(OpticalEffect::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class, StoneEnum::PRIMARY_KEY->value);
    }
}
