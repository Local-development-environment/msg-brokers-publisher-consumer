<?php
declare(strict_types=1);

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Admin\NecklaceProperty\Necklaces\Requests\NecklaceStoreRequest;
use App\Http\Admin\NecklaceProperty\Necklaces\Requests\NecklaceUpdateRequest;
use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceCollection;
use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\NecklaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class NecklaceController extends Controller
{
    public function __construct(public NecklaceService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new NecklaceCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Throwable
     */
    public function store(NecklaceStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new NecklaceResource($model))
            ->response()
            ->header('Location', route(NecklaceNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new NecklaceResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(NecklaceUpdateRequest $request, int $id): JsonResponse
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
