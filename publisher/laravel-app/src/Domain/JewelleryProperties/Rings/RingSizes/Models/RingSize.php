<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingSizes\Models;

use Domain\JewelleryProperties\Rings\RingMetrics\Models\RingMetric;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class RingSize extends Model
{
    protected $table = RingSizeEnum::TABLE_NAME->value;
    protected $fillable = ['value', 'unit'];

    public const string TYPE_RESOURCE = RingSizeEnum::TYPE_RESOURCE->value;

    public function rings(): BelongsToMany
    {
        return $this->belongsToMany(Ring::class, 'id');
    }

    public function ringMetrics(): HasMany
    {
        return $this->hasMany(RingMetric::class, 'id');
    }
}
