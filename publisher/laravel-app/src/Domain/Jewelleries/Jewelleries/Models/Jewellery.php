<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Models;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Brooches\Brooches\Models\Brooch;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Models\CharmPendant;
use Domain\JewelleryProperties\Pendants\Pendants\Models\Pendant;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\TieClips\TieClips\Models\TieClip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Jewellery extends Model
{
    protected $table = JewelleryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = JewelleryEnum::TYPE_RESOURCE->value;

    protected $fillable = ['jewellery_category_id', 'name', 'description','part_number','approx_weight','is_active','slug'];

    public function inserts(): HasMany
    {
        return $this->hasMany(Insert::class);
    }

    public function jewelleryCategory(): BelongsTo
    {
        return $this->belongsTo(JewelleryCategory::class);
    }

    public function bracelet(): HasOne
    {
        return $this->hasOne(Bracelet::class, 'id');
    }

    public function chain(): HasOne
    {
        return $this->hasOne(Chain::class, 'id');
    }

    public function bead(): HasOne
    {
        return $this->hasOne(Bead::class, 'id');
    }

    public function ring(): HasOne
    {
        return $this->hasOne(Ring::class, 'id');
    }

    public function brooch(): HasOne
    {
        return $this->hasOne(Brooch::class, 'id');
    }

    public function charmPendant(): HasOne
    {
        return $this->hasOne(CharmPendant::class, 'id');
    }

    public function pendant(): HasOne
    {
        return $this->hasOne(Pendant::class, 'id');
    }

    public function tieClip(): HasOne
    {
        return $this->hasOne(TieClip::class, 'id');
    }
}
