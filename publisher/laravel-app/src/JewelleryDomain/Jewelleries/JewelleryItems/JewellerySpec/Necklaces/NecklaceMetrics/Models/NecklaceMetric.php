<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class NecklaceMetric extends Model
{
    protected $table = NecklaceMetricEnum::TABLE_NAME->value;
    protected $fillable = ['neck_size_id', 'necklace_id', 'quantity', 'price'];

    public const string TYPE_RESOURCE = NecklaceMetricEnum::TYPE_RESOURCE->value;

    public function neckSize(): BelongsTo
    {
        return $this->belongsTo(NeckSize::class);
    }

    public function necklace(): BelongsTo
    {
        return $this->belongsTo(Necklace::class);
    }
}
