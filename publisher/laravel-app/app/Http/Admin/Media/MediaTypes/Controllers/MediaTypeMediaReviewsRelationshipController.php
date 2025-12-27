<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeMediaReviewsRelationshipService;
use Illuminate\Http\JsonResponse;

final class MediaTypeMediaReviewsRelationshipController extends Controller
{
    public function __construct(public MediaTypeMediaReviewsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (ApiEntityIdentifierResource::collection($collection))->response();
    }
}
