<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneFacetRelatedController extends Controller
{
    public function __construct(public InsertExteriorsStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneFacetResource($model))->response();
    }
}
