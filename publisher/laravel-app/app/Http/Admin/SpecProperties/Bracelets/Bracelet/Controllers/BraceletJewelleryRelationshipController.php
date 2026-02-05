<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Services\Relationships\BraceletJewelleryRelationshipService;

final class BraceletJewelleryRelationshipController extends Controller
{
    public function __construct(public BraceletJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
