<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Services\Relationships\PiercingJewelleryRelationshipService;

final class PiercingJewelleryRelatedController extends Controller
{
    public function __construct(public PiercingJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
