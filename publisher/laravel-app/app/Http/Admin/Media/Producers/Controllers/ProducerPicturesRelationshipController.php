<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Producers\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Medias\Shared\Producers\Services\Relationships\ProducerPicturesRelationshipService;
use Illuminate\Http\JsonResponse;

final class ProducerPicturesRelationshipController extends Controller
{
    public function __construct(public ProducerPicturesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (ApiEntityIdentifierResource::collection($collection))->response();
    }
}
