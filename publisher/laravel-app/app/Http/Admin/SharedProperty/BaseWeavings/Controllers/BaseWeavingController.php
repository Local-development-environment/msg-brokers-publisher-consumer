<?php

declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\BaseWeavings\Controllers;

use App\Http\Admin\SharedProperty\BaseWeavings\Requests\BaseWeavingStoreRequest;
use App\Http\Admin\SharedProperty\BaseWeavings\Requests\BaseWeavingUpdateRequest;
use App\Http\Admin\SharedProperty\BaseWeavings\Resources\BaseWeavingCollection;
use App\Http\Admin\SharedProperty\BaseWeavings\Resources\BaseWeavingResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingNameRoutesEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Services\BaseWeavingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class BaseWeavingController extends Controller
{
    public function __construct(public BaseWeavingService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BaseWeavingCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(BaseWeavingStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BaseWeavingResource($model))
            ->response()
            ->header('Location', route(BaseWeavingNameRoutesEnum::CRUD_SHOW->value, [
                BaseWeavingEnum::PRIMARY_KEY->value => $model->id
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

        return (new BaseWeavingResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(BaseWeavingUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
