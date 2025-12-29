<?php

namespace Domain\JewelleryProperties\Pendants\Pendants\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Pendants\Pendants\Enums\PendantEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendant extends Model
{
    protected $table = PendantEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id', 'dimensions'];

    public const string TYPE_RESOURCE = PendantEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
