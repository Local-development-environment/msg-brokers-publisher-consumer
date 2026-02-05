<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneColours\Controllers;

use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Services\Relationships\StoneColourStoneExteriorsRelationshipService;

final class StoneColourStoneExteriorsRelatedController extends Controller
{
    public function __construct(public StoneColourStoneExteriorsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneExteriorCollection($collection))->response();
    }
}
