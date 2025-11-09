<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Jewelleries\Models;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryEnum;
use Domain\JewelleryGenerator\Jewelleries\Category;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Jewellery extends Model
{
    protected $table = JewelleryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = JewelleryEnum::TYPE_RESOURCE->value;

    public function inserts(): HasMany
    {
        return $this->hasMany(Insert::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bracelet(): HasOne
    {
        return $this->hasOne(Bracelet::class);
    }

    public function bead(): HasOne
    {
        return $this->hasOne(Bead::class, 'id');
    }
}
