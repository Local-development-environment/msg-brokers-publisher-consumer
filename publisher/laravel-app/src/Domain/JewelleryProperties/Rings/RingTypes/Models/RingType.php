<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingTypes\Models;

use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class RingType extends Model
{
    protected $table = RingTypeEnum::TABLE_NAME->value;
    protected $fillable = ['value', 'unit'];

    public const string TYPE_RESOURCE = RingTypeEnum::TYPE_RESOURCE->value;

    public function rings(): BelongsToMany
    {
        return $this->belongsToMany(Ring::class, 'id');
    }

    public function ringDetails(): HasMany
    {
        return $this->hasMany(RingDetail::class, 'id');
    }
}
