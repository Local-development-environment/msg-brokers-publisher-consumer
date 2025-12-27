<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeReviewMediasRelationshipService;
use Illuminate\Http\JsonResponse;

final class MediaTypeReviewMediasRelationshipController extends Controller
{
    public function __construct(public MediaTypeReviewMediasRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (ApiEntityIdentifierResource::collection($collection))->response();
    }
}
