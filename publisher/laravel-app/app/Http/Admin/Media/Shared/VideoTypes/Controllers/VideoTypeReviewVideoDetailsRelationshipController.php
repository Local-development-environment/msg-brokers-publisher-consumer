<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Services\Relationships\VideoTypeReviewVideoDetailsRelationshipService;

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
