<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Domain\JewelleryProperties\Chains\Chains\Enums\ChainEnum;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Chain extends Model
{
    protected $table = ChainEnum::TABLE_NAME->value;
    protected $fillable = ['clasp_id', 'id'];

    public const string TYPE_RESOURCE = ChainEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }

    public function chainMetrics(): HasMany
    {
        return $this->hasMany(ChainMetric::class);
    }

    public function clasp(): BelongsTo
    {
        return $this->belongsTo(Clasp::class);
    }

    public function neckSizes(): BelongsToMany
    {
        return $this->belongsToMany(NeckSize::class, ChainMetricEnum::TABLE_NAME->value);
    }
}
