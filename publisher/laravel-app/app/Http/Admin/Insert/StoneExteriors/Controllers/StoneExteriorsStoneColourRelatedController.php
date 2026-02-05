<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships\StoneExteriorsStoneColourRelationshipService;
use Resources\StoneColourResource;

final class StoneExteriorsStoneColourRelatedController extends Controller
{
    public function __construct(public StoneExteriorsStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneColourResource($model))->response();
    }
}
