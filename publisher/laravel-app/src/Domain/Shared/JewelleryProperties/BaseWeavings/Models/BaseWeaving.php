<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\BaseWeavings\Models;

use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\Weavings\Models\Weaving;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BaseWeaving extends Model
{
    protected $table = BaseWeavingEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BaseWeavingEnum::TYPE_RESOURCE->value;

    public function weavings(): HasMany
    {
        return $this->hasMany(Weaving::class);
    }
}
