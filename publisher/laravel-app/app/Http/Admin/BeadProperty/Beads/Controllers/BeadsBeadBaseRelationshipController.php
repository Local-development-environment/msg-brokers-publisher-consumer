<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsBeadBaseRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsBeadBaseRelationshipController extends Controller
{
    public function __construct(public BeadsBeadBaseRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
