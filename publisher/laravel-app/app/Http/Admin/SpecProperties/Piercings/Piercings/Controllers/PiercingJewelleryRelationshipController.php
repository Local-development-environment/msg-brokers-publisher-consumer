<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Services\Relationships\PiercingJewelleryRelationshipService;

final class PiercingJewelleryRelationshipController extends Controller
{
    public function __construct(public PiercingJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
