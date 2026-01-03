<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneExteriors\Services\Relationships\StoneExteriorsStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneFacetRelatedController extends Controller
{
    public function __construct(public StoneExteriorsStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneFacetResource($model))->response();
    }
}
