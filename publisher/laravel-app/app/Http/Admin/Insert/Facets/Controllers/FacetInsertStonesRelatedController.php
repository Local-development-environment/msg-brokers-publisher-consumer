<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Controllers;

use App\Http\Admin\Insert\StoneExteriours\Resources\StoneExteriorCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Facets\Services\Relationships\FacetInsertStonesRelationshipService;

final class FacetInsertStonesRelatedController extends Controller
{
    public function __construct(public FacetInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneExteriorCollection($collection))->response();
    }
}
