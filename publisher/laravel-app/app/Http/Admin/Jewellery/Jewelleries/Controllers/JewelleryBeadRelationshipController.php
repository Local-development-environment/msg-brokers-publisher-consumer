<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Services\Relationships\JewelleryBeadRelationshipService;

final class JewelleryBeadRelationshipController extends Controller
{
    public function __construct(public JewelleryBeadRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
