<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\Shared\VideoTypes\Services\Relationships\VideoTypeReviewVideoDetailsRelationshipService;
use Illuminate\Http\JsonResponse;

final class VideoTypeReviewVideoDetailsRelationshipController extends Controller
{
    public function __construct(public VideoTypeReviewVideoDetailsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (ApiEntityIdentifierResource::collection($model))->response();
    }
}
