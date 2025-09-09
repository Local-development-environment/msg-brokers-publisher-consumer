<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NaturalStoneGradeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
