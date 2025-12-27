<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\MediaCatalogCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeCatalogMediasRelationshipService;
use Illuminate\Http\JsonResponse;

final class MediaTypeCatalogMediasRelatedController extends Controller
{
    public function __construct(public MediaTypeCatalogMediasRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new MediaCatalogCollection($collection))->response();
    }
}
