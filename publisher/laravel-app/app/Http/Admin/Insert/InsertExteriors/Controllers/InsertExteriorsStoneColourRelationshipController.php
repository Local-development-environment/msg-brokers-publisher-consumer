<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneColourRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneColourRelationshipController extends Controller
{
    public function __construct(public InsertExteriorsStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
