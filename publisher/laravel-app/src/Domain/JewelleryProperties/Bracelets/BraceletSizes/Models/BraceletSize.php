<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletSizes\Models;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BraceletSize extends Model
{
    protected $table = BraceletSizeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletSizeEnum::TYPE_RESOURCE->value;

    public function braceletMetrics(): HasMany
    {
        return $this->hasMany(BraceletMetric::class);
    }

    public function bracelets(): BelongsToMany
    {
        return $this->belongsToMany(Bracelet::class, BraceletMetricEnum::TABLE_NAME->value);
    }
}
