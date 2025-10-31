<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Models;

use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Illuminate\Database\Eloquent\Model;

final class VJewellery extends Model
{
    protected $table = VJewelleryEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VJewelleryEnum::TYPE_RESOURCE->value;
}