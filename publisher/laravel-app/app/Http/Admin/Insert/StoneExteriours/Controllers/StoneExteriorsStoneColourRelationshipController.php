<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneExteriours\Services\Relationships\StoneExteriorsStoneColourRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneColourRelationshipController extends Controller
{
    public function __construct(public StoneExteriorsStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
