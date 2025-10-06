<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Models;

use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Weaving extends Model
{
    protected $table = WeavingEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = WeavingEnum::TYPE_RESOURCE->value;

    public function braceletWeavings(): HasMany
    {
        return $this->hasMany(BraceletWeaving::class);
    }
}
