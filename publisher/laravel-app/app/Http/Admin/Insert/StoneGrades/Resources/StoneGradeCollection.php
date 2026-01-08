<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGrades\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class StoneGradeCollection extends ResourceCollection
{
    use JsonApiSpecificationCollectionTrait;
}
