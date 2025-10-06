<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Bracelets\BodyParts\Models\BodyPart;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Models\BraceletBase;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models\BraceletMetric;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Bracelet extends Model
{
    protected $table = BraceletEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function bodyPart(): BelongsTo
    {
        return $this->belongsTo(BodyPart::class);
    }

    public function braceletBase(): BelongsTo
    {
        return $this->belongsTo(BraceletBase::class);
    }

    public function clasp(): BelongsTo
    {
        return $this->belongsTo(Clasp::class);
    }

    public function braceletMetrics(): HasMany
    {
        return $this->hasMany(BraceletMetric::class);
    }

    public function braceletSizes(): BelongsToMany
    {
        return $this->belongsToMany(BraceletSize::class, BraceletMetricEnum::TABLE_NAME->value);
    }

    public function braceletWeaving(): HasOne
    {
        return $this->hasOne(BraceletWeaving::class);
    }
}
