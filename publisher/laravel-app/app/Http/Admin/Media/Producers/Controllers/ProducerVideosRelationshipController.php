<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Producers\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\Shared\Producers\Services\Relationships\ProducerVideosRelationshipService;
use Illuminate\Http\JsonResponse;

final class ProducerVideosRelationshipController extends Controller
{
    public function __construct(public ProducerVideosRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (ApiEntityIdentifierResource::collection($collection))->response();
    }
}
