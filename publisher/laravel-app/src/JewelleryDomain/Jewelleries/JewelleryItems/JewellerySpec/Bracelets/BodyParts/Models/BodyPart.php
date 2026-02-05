<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;

final class BodyPart extends Model
{
    protected $table = BodyPartEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BodyPartEnum::TYPE_RESOURCE->value;

    public function bracelets(): HasMany
    {
        return $this->hasMany(Bracelet::class);
    }
}
