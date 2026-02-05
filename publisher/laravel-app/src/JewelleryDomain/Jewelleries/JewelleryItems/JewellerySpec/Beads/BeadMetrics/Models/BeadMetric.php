<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

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
