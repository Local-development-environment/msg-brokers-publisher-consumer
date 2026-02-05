<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Resources\CatalogMediaCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeCatalogMediasRelationshipService;

final class MediaTypeCatalogMediasRelatedController extends Controller
{
    public function __construct(public MediaTypeCatalogMediasRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new CatalogMediaCollection($collection))->response();
    }
}
