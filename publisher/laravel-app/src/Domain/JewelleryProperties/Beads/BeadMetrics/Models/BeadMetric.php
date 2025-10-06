<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Models;

use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BeadMetric extends Model
{
    protected $table = BeadMetricEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BeadMetricEnum::TYPE_RESOURCE->value;

    public function beadSize(): BelongsTo
    {
        return $this->belongsTo(BeadSize::class);
    }

    public function bead(): BelongsTo
    {
        return $this->belongsTo(Bead::class);
    }
}
