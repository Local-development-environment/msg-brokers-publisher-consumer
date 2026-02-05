<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Models\ChainMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;

final class ChainWeaving extends Model
{
    protected $table = ChainWeavingEnum::TABLE_NAME->value;
    protected $fillable = ['clasp_id', 'id'];

    public const string TYPE_RESOURCE = ChainWeavingEnum::TYPE_RESOURCE->value;

    public function chain(): BelongsTo
    {
        return $this->belongsTo(Chain::class);
    }

    public function weaving(): BelongsTo
    {
        return $this->belongsTo(Weaving::class);
    }

    public function chainMetrics(): BelongsTo
    {
        return $this->belongsTo(ChainMetric::class);
    }
}
