<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizesChainsRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizesChainsRelatedController extends Controller
{
    public function __construct(public NeckSizesChainsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ChainCollection($collection))->response();
    }
}
