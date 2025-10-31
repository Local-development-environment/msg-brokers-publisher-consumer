<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Controllers;

use App\Http\Admin\Insert\InsertExteriors\Resources\InsertExteriorCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\Facets\Services\Relationships\FacetInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

final class FacetInsertStonesRelatedController extends Controller
{
    public function __construct(public FacetInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertExteriorCollection($collection))->response();
    }
}
