<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships\StoneNaturalStoneRelationshipService;

final class StoneNaturalStoneRelatedController extends Controller
{
    public function __construct(public StoneNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return $model ? (new NaturalStoneResource($model))->response() : response()->json()->setStatusCode(204);
    }
}
