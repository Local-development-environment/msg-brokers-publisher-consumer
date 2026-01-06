<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BodyParts\Models;

use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class BodyPart extends Model
{
    protected $table = BodyPartEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BodyPartEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }
}
