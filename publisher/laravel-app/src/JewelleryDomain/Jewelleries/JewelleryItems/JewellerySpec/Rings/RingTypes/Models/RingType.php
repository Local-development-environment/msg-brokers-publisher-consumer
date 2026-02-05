<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Models\RingDetail;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models\Ring;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums\RingTypeEnum;

final class RingType extends Model
{
    protected $table = RingTypeEnum::TABLE_NAME->value;
    protected $fillable = ['value', 'unit'];

    public const string TYPE_RESOURCE = RingTypeEnum::TYPE_RESOURCE->value;

    public function rings(): BelongsToMany
    {
        return $this->belongsToMany(Ring::class, RingDetailEnum::TABLE_NAME->value);
    }

    public function ringDetails(): HasMany
    {
        return $this->hasMany(RingDetail::class, 'id');
    }
}
