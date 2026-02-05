<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;

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
