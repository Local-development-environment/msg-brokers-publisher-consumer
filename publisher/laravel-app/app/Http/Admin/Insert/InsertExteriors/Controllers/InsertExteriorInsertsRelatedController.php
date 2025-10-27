<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorInsertsRelatedController extends Controller
{
    public function __construct(public InsertExteriorInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertCollection($collection))->response();
    }
}
