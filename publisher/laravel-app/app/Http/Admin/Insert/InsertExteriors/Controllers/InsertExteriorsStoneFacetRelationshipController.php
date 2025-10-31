<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneFacetRelationshipController extends Controller
{
    public function __construct(public InsertExteriorsStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
