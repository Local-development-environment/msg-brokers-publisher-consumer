<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models\BraceletMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;

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
