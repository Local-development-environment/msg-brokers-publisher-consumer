<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Bracelets\Bracelets\Services\Relationships\BraceletsBraceletSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletsBraceletSizesRelationshipController extends Controller
{
    public function __construct(public BraceletsBraceletSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
