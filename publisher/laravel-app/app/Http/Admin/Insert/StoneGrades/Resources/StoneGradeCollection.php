<?php

namespace App\Http\Admin\Insert\StoneGrades\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoneGradeCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
