<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadMetrics\Models;

use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class BeadMetric extends Model
{
    protected $table = BeadMetricEnum::TABLE_NAME->value;
    protected $fillable = ['neck_size_id', 'bead_id', 'quantity', 'price'];

    public const string TYPE_RESOURCE = BeadMetricEnum::TYPE_RESOURCE->value;

    public function neckSize(): BelongsTo
    {
        return $this->belongsTo(NeckSize::class);
    }

    public function bead(): BelongsTo
    {
        return $this->belongsTo(Bead::class);
    }
}
