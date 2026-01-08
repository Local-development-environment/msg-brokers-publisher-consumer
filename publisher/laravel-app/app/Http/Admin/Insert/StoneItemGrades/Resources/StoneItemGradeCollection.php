<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneItemGrades\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class StoneItemGradeCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
