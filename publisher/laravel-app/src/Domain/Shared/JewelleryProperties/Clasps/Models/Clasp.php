<?php
declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Clasps\Models;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Clasp extends Model
{
    protected $table = ClaspEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = ClaspEnum::TYPE_RESOURCE->value;

    public function beads(): HasMany
    {
        return $this->hasMany(Bead::class);
    }

    public function beadBases(): BelongsToMany
    {
        return $this->belongsToMany(BeadBase::class, BeadEnum::TABLE_NAME->value);
    }
}
