<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Models;

use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Models\ChainWeaving;
use Domain\Shared\JewelleryProperties\BaseWeavings\Models\BaseWeaving;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Weaving extends Model
{
    protected $table = WeavingEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = WeavingEnum::TYPE_RESOURCE->value;

    public function braceletWeavings(): HasMany
    {
        return $this->hasMany(BraceletWeaving::class);
    }

    public function chainWeavings(): HasMany
    {
        return $this->hasMany(ChainWeaving::class);
    }

    public function baseWeaving(): BelongsTo
    {
        return $this->belongsTo(BaseWeaving::class);
    }

    public function bracelets(): BelongsToMany
    {
        return $this->belongsToMany(Bracelet::class, BraceletWeavingEnum::TABLE_NAME->value);
    }

    public function chains(): BelongsToMany
    {
        return $this->belongsToMany(Chain::class, ChainWeavingEnum::TABLE_NAME->value);
    }
}
