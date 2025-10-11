<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\Beads\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Bead extends Model
{
    protected $table = BeadEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BeadEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }

    public function beadMetrics(): HasMany
    {
        return $this->hasMany(BeadMetric::class);
    }

    public function clasp(): BelongsTo
    {
        return $this->belongsTo(Clasp::class);
    }

    public function beadBase(): BelongsTo
    {
        return $this->belongsTo(BeadBase::class);
    }

    public function beadSizes(): BelongsToMany
    {
        return $this->belongsToMany(BeadSize::class, BeadMetricEnum::TABLE_NAME->value);
    }
}
