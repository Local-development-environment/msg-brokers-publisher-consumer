<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantEnum;

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
