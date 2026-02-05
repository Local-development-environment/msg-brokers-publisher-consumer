<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Enums\NecklaceEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class Necklace extends Model
{
    protected $table = NecklaceEnum::TABLE_NAME->value;
    protected $fillable = ['clasp_id', 'id'];

    public const string TYPE_RESOURCE = NecklaceEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }

    public function necklaceMetrics(): HasMany
    {
        return $this->hasMany(NecklaceMetric::class);
    }

    public function clasp(): BelongsTo
    {
        return $this->belongsTo(Clasp::class);
    }

    public function neckSizes(): BelongsToMany
    {
        return $this->belongsToMany(NeckSize::class, NecklaceMetricEnum::TABLE_NAME->value);
    }
}
