<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Models;

use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
