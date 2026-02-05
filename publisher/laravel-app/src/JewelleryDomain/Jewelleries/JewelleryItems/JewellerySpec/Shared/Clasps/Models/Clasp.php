<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspEnum;

final class Clasp extends Model
{
    protected $table = ClaspEnum::TABLE_NAME->value;
    protected $fillable = ['name', 'slug'];

    public const string TYPE_RESOURCE = ClaspEnum::TYPE_RESOURCE->value;

    public function beads(): HasMany
    {
        return $this->hasMany(Bead::class);
    }

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }

    public function chains(): HasMany
    {
        return $this->hasMany(Chain::class);
    }
}
