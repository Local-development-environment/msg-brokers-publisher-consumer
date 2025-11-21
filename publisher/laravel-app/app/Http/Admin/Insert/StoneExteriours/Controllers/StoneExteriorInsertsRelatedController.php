<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriours\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneExteriours\Services\Relationships\StoneExteriorInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorInsertsRelatedController extends Controller
{
    public function __construct(public StoneExteriorInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertCollection($collection))->response();
    }
}
