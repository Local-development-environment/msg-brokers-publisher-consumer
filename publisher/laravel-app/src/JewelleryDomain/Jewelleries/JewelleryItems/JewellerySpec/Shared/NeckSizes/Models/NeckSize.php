<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums\ChainMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Models\ChainMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models\LengthName;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeEnum;

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
