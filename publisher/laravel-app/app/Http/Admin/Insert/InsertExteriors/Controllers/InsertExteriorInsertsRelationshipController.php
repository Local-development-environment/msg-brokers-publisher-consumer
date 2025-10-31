<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorInsertsRelationshipController extends Controller
{
    public function __construct(public InsertExteriorInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
