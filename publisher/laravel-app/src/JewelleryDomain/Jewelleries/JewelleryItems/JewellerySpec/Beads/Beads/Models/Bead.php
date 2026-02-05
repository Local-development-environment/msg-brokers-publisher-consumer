<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Models\BeadBase;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models\Clasp;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class Bead extends Model
{
    protected $table = BeadEnum::TABLE_NAME->value;
    protected $fillable = ['clasp_id','bead_base_id','id'];

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

    public function neckSizes(): BelongsToMany
    {
        return $this->belongsToMany(NeckSize::class, BeadMetricEnum::TABLE_NAME->value);
    }
}
