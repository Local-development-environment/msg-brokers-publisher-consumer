<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;
use JewelleryDomain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Enums\JewelleryEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Models\Brooch;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Models\CharmPendant;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Models\Pendant;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models\Ring;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Models\TieClip;

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
