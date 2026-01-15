<?php
declare(strict_types=1);

namespace App\Http\Admin\Users\Admins\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class VAdminCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
