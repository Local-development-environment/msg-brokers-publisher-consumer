<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Colours\Controllers;

use App\Http\Admin\Insert\StoneExteriours\Resources\StoneExteriorCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\Colours\Services\Relationships\ColourInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

final class ColourInsertStonesRelatedController extends Controller
{
    public function __construct(public ColourInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneExteriorCollection($collection))->response();
    }
}
