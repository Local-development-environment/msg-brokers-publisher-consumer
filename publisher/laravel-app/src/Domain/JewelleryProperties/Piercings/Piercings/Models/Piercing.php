<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Piercings\Piercings\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
