<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneExteriors\Services\Relationships\StoneExteriorsStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneFacetRelationshipController extends Controller
{
    public function __construct(public StoneExteriorsStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
