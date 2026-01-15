<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadBase\Controllers;

use App\Http\Admin\SpecProperties\Beads\BeadBase\Requests\BeadBaseStoreRequest;
use App\Http\Admin\SpecProperties\Beads\BeadBase\Requests\BeadBaseUpdateRequest;
use App\Http\Admin\SpecProperties\Beads\BeadBase\Resources\BeadBaseCollection;
use App\Http\Admin\SpecProperties\Beads\BeadBase\Resources\BeadBaseResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Services\BeadBaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class BeadBaseController extends Controller
{
    public function __construct(public BeadBaseService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadBaseCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(BeadBaseStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BeadBaseResource($model))
            ->response()
            ->header('Location', route(BeadBaseNameRoutesEnum::CRUD_SHOW->value, [
                'id' => $model->id
            ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new BeadBaseResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(BeadBaseUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
