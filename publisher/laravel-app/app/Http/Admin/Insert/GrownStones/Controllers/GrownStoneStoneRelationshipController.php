<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Services\Relationships\GrownStoneStoneRelationshipService;

final class GrownStoneStoneRelationshipController extends Controller
{
    public function __construct(public GrownStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
