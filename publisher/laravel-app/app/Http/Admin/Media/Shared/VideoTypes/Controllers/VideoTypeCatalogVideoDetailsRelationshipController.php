<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\ReviewMedias\ReviewVideoDetails\Services\Relationships\ReviewVideoDetailsVideoTypeRelationshipService;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeCatalogMediasRelationshipService;
use Domain\Medias\Shared\VideoTypes\Services\Relationships\VideoTypeCatalogVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoTypeCatalogVideoDetailsRelationshipController extends Controller
{
    public function __construct(public VideoTypeCatalogVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (ApiEntityIdentifierResource::collection($model))->response();
    }
}
