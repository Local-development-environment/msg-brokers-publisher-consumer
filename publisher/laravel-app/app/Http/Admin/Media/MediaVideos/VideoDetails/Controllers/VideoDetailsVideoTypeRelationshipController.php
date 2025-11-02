<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\MediaVideos\VideoDetails\Services\Relationships\VideoDetailsVideoTypeRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoDetailsVideoTypeRelationshipController extends Controller
{
    public function __construct(public VideoDetailsVideoTypeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
