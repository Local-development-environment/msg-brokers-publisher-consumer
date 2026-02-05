<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships\StoneImitationStoneRelationshipService;

final class StoneImitationStoneRelatedController extends Controller
{
    public function __construct(public StoneImitationStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return $model ? (new ImitationStoneResource($model))->response() : response()->json()->setStatusCode(204);
    }
}
