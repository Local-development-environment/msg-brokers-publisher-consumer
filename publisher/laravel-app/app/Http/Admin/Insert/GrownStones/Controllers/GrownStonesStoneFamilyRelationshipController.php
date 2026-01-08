<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\GrownStones\Services\Relationships\GrownStonesStoneFamilyRelationshipService;
use Illuminate\Http\JsonResponse;

final class GrownStonesStoneFamilyRelationshipController extends Controller
{
    public function __construct(public GrownStonesStoneFamilyRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
