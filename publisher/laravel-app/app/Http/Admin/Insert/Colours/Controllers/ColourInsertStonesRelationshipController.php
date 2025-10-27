<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Colours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\Colours\Services\Relationships\ColourInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

final class ColourInsertStonesRelationshipController extends Controller
{
    public function __construct(public ColourInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
