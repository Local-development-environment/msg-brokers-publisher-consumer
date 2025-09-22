<?php

namespace App\Http\Admin\Users\Admins\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VAdminCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
