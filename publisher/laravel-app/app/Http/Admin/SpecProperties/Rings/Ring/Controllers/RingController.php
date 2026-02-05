<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\Ring\Controllers;

use App\Http\Admin\SpecProperties\Rings\Ring\Requests\RingStoreRequest;
use App\Http\Admin\SpecProperties\Rings\Ring\Requests\RingUpdateRequest;
use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingCollection;
use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Enums\RingNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Services\RingService;
use Throwable;

final class RingController extends Controller
{
    public function __construct(public RingService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new RingCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(RingStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new RingResource($model))
            ->response()
            ->header('Location', route(RingNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new RingResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(RingUpdateRequest $request, int $id): JsonResponse
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
