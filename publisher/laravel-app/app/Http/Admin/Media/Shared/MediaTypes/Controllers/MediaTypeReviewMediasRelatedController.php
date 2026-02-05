<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\MediaTypes\Controllers;

use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Resources\ReviewMediaCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Services\Relationships\MediaTypeReviewMediasRelationshipService;

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
