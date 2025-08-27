<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryViews\Models;

use Illuminate\Database\Eloquent\Model;

final class VJewellery extends Model
{
    const string TYPE_RESOURCE = 'vJewelleries';

    protected $table = 'jw_views.jewelleries';
}