<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneExteriours\Services\Relationships\StoneExteriorInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorInsertsRelationshipController extends Controller
{
    public function __construct(public StoneExteriorInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
