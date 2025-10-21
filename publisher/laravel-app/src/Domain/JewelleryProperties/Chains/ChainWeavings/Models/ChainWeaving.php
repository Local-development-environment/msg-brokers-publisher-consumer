<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\ChainWeavings\Models;

use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use Domain\Shared\JewelleryProperties\Weavings\Models\Weaving;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
