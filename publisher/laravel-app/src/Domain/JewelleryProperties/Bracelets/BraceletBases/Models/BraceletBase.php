<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Models;

use Domain\JewelleryProperties\Bracelets\BodyParts\Models\BodyPart;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BraceletBase extends Model
{
    protected $table = BraceletBaseEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletBaseEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }

    public function bodyParts(): BelongsToMany
    {
        return $this->belongsToMany(BodyPart::class, BraceletEnum::TABLE_NAME->value);
    }

    public function clasps(): BelongsToMany
    {
        return $this->belongsToMany(Clasp::class, BraceletEnum::TABLE_NAME->value);
    }
}
