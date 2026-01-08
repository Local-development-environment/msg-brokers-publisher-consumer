<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Resources\ReviewMediaCollection;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeReviewMediasRelationshipService;
use Illuminate\Http\JsonResponse;

final class MediaTypeReviewMediasRelatedController extends Controller
{
    public function __construct(public MediaTypeReviewMediasRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ReviewMediaCollection($collection))->response();
    }
}
