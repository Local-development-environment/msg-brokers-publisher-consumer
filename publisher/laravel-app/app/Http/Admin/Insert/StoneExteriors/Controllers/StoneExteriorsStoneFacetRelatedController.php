<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships\StoneExteriorsStoneFacetRelationshipService;

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
