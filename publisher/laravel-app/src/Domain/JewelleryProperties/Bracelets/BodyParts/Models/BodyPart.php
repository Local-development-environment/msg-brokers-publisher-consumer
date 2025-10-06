<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Models;

use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Models\BraceletBase;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BodyPart extends Model
{
    protected $table = BodyPartEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BodyPartEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }

    public function braceletBases(): BelongsToMany
    {
        return $this->belongsToMany(BraceletBase::class, BraceletEnum::TABLE_NAME->value);
    }

    public function clasps(): BelongsToMany
    {
        return $this->belongsToMany(Clasp::class, BraceletEnum::TABLE_NAME->value);
    }
}
