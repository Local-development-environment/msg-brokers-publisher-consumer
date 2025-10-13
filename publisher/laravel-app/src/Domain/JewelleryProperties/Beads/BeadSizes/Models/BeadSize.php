<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadSizes\Models;

use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BeadSize extends Model
{
    protected $table = BeadSizeEnum::TABLE_NAME->value;
    protected $fillable = ['length_name_id','value', 'unit'];

    public const string TYPE_RESOURCE = BeadSizeEnum::TYPE_RESOURCE->value;

    public function lengthName(): BelongsTo
    {
        return $this->belongsTo(LengthName::class);
    }

    public function beadMetrics(): HasMany
    {
        return $this->hasMany(BeadMetric::class);
    }

    public function beads(): BelongsToMany
    {
        return $this->belongsToMany(Bead::class, BeadMetricEnum::TABLE_NAME->value);
    }
}
