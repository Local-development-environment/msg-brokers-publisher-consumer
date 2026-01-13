<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\TieClips\TieClips\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\TieClips\TieClips\Enums\TieClipEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class TieClip extends Model
{
    protected $table = TieClipEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id', 'dimensions'];

    public const string TYPE_RESOURCE = TieClipEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
