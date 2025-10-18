<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\Necklaces\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceEnum;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
