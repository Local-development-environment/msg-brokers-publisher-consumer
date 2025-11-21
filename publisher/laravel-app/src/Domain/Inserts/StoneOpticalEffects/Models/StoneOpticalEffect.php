<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneOpticalEffects\Models;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
