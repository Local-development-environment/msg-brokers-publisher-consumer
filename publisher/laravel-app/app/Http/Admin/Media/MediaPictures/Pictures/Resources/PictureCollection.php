<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaPictures\Pictures\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class PictureCollection extends ResourceCollection
{
    use IncludeRelatedEntitiesCollectionTrait;
}
