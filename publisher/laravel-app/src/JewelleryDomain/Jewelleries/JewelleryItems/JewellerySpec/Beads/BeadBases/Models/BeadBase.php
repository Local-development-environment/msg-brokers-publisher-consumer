<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class BeadBase extends Model
{
    protected $table = BeadBaseEnum::TABLE_NAME->value;
    protected $fillable = ['name', 'slug'];

    public const string TYPE_RESOURCE = BeadBaseEnum::TYPE_RESOURCE->value;

    public function beads(): HasMany
    {
        return $this->hasMany(Bead::class);
    }
}
