<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Admin\BeadProperty\BeadSizes\Requests\BeadSizeStoreRequest;
use App\Http\Admin\BeadProperty\BeadSizes\Requests\BeadSizeUpdateRequest;
use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeCollection;
use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\BeadSizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class BeadSizeController extends Controller
{
    public function __construct(public BeadSizeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadSizeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(BeadSizeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BeadSizeResource($model))
            ->response()
            ->header('Location', route(BeadSizeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new BeadSizeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(BeadSizeUpdateRequest $request, int $id): JsonResponse
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
