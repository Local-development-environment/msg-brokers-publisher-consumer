<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;

final class BaseWeaving extends Model
{
    protected $table = BaseWeavingEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BaseWeavingEnum::TYPE_RESOURCE->value;

    public function weavings(): HasMany
    {
        return $this->hasMany(Weaving::class);
    }
}
