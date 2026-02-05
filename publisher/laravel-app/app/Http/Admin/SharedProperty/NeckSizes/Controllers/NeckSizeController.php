<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Requests\NeckSizeStoreRequest;
use App\Http\Admin\SharedProperty\NeckSizes\Requests\NeckSizeUpdateRequest;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\NeckSizeService;

final class NeckSizeController extends Controller
{
    public function __construct(public NeckSizeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new NeckSizeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(NeckSizeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new NeckSizeResource($model))
            ->response()
            ->header('Location', route(NeckSizeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new NeckSizeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(NeckSizeUpdateRequest $request, int $id): JsonResponse
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
