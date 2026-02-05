<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums\ChainWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Models\ChainWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Models\BaseWeaving;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingEnum;

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
