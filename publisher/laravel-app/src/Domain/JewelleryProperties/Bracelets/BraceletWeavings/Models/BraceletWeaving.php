<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models;

use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\Shared\JewelleryProperties\Weavings\Models\Weaving;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class BraceletWeaving extends Model
{
    protected $table = BraceletWeavingEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletWeavingEnum::TYPE_RESOURCE->value;

    public function weaving(): BelongsTo
    {
        return $this->belongsTo(Weaving::class);
    }

    public function bracelet(): BelongsTo
    {
        return $this->belongsTo(Bracelet::class);
    }
}
