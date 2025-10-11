<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Shared\JewelleryProperties\Clasps\Services\Relationships\ClaspBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

final class ClaspBeadsRelationshipController extends Controller
{
    public function __construct(public ClaspBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
