<?php

namespace App\Http\Admin\Users\Employees\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VEmployeeCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
