<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums\ChainMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Models\ChainMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums\ChainEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Models\ChainWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;

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

    public function chainWeavings(): HasMany
    {
        return $this->hasMany(ChainWeaving::class);
    }

    public function clasp(): BelongsTo
    {
        return $this->belongsTo(Clasp::class);
    }

    public function neckSizes(): BelongsToMany
    {
        return $this->belongsToMany(NeckSize::class, ChainMetricEnum::TABLE_NAME->value);
    }

    public function weavings(): BelongsToMany
    {
        return $this->belongsToMany(Weaving::class, ChainWeavingEnum::TABLE_NAME->value);
    }
}
