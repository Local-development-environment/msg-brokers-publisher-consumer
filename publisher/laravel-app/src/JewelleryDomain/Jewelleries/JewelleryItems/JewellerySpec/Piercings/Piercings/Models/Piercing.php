<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums\PiercingEnum;

final class Piercing extends Model
{
    protected $table = PiercingEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id'];

    public const string TYPE_RESOURCE = PiercingEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
