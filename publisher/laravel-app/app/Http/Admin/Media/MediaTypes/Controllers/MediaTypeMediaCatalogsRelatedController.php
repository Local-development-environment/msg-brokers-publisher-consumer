<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaTypes\Controllers;

use App\Http\Admin\Media\MediaCatalogs\Resources\MediaCatalogCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeMediaCatalogsRelationshipService;
use Illuminate\Http\JsonResponse;

final class MediaTypeMediaCatalogsRelatedController extends Controller
{
    public function __construct(public MediaTypeMediaCatalogsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new MediaCatalogCollection($collection))->response();
    }
}
