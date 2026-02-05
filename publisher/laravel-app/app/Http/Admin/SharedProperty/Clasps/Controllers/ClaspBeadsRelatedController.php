<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Services\Relationships\ClaspBeadsRelationshipService;

final class ClaspBeadsRelatedController extends Controller
{
    public function __construct(public ClaspBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadCollection($collection))->response();
    }
}
