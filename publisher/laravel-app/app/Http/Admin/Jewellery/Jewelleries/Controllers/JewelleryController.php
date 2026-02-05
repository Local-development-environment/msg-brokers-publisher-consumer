<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Requests\JewelleryStoreRequest;
use App\Http\Admin\Jewellery\Jewelleries\Requests\JewelleryUpdateRequest;
use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryCollection;
use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Enums\JewelleryNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryBase\Services\JewelleryService;

final class JewelleryController extends Controller
{
    public function __construct(public JewelleryService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new JewelleryCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(JewelleryStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new JewelleryResource($model))
            ->response()
            ->header('Location', route(JewelleryNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new JewelleryResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(JewelleryUpdateRequest $request, int $id): JsonResponse
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
