<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CharmPendants\CharmPendants\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CharmPendant extends Model
{
    protected $table = CharmPendantEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id', 'dimensions'];

    public const string TYPE_RESOURCE = CharmPendantEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
