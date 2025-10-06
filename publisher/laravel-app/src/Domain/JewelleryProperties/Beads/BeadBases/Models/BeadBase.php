<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Beads\BeadBases\Models;

use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BeadBase extends Model
{
    protected $table = BeadBaseEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BeadBaseEnum::TYPE_RESOURCE->value;

    public function beads(): HasMany
    {
        return $this->hasMany(Bead::class);
    }

    public function clasps(): BelongsToMany
    {
        return $this->belongsToMany(Clasp::class, BeadEnum::TABLE_NAME->value);
    }
}
