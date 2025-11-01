<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\MediaVideos\Videos\Services\Relationships\VideoVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoVideoDetailsRelationshipController extends Controller
{
    public function __construct(public VideoVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (ApiEntityIdentifierResource::collection($model))->response();
    }
}
