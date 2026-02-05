<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryViews\Models;

use Illuminate\Database\Eloquent\Model;
use JewelleryDomain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;

final class VJewellery extends Model
{
    protected $table = VJewelleryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VJewelleryEnum::TYPE_RESOURCE->value;
}
