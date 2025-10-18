<?php

namespace Domain\Shared\JewelleryProperties\NeckSizes\Models;

use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NeckSize extends Model
{
    protected $table = NeckSizeEnum::TABLE_NAME->value;
    protected $fillable = ['length_name_id', 'value', 'unit'];

    public const string TYPE_RESOURCE = NeckSizeEnum::TYPE_RESOURCE->value;

    public function lengthName(): BelongsTo
    {
        return $this->belongsTo(LengthName::class);
    }

    public function beadMetrics(): HasMany
    {
        return $this->hasMany(BeadMetric::class);
    }

    public function chainMetrics(): HasMany
    {
        return $this->hasMany(ChainMetric::class);
    }

    public function necklaceMetrics(): HasMany
    {
        return $this->hasMany(NecklaceMetric::class);
    }

    public function beads(): BelongsToMany
    {
        return $this->belongsToMany(Bead::class, BeadMetricEnum::TABLE_NAME->value);
    }

    public function chains(): BelongsToMany
    {
        return $this->belongsToMany(Chain::class, ChainMetricEnum::TABLE_NAME->value);
    }

    public function necklaces(): BelongsToMany
    {
        return $this->belongsToMany(Necklace::class, NecklaceMetricEnum::TABLE_NAME->value);
    }
}
