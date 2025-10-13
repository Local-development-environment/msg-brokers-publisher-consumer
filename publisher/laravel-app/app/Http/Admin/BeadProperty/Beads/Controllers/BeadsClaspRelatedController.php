<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsClaspRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsClaspRelatedController extends Controller
{
    public function __construct(public BeadsClaspRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ClaspResource($model))->response();
    }
}
