<?php
declare(strict_types=1);

namespace App\Http\Admin\BroochProperty\Brooches\Controllers;

use App\Http\Admin\BroochProperty\Brooches\Requests\BroochStoreRequest;
use App\Http\Admin\BroochProperty\Brooches\Requests\BroochUpdateRequest;
use App\Http\Admin\BroochProperty\Brooches\Resources\BroochCollection;
use App\Http\Admin\BroochProperty\Brooches\Resources\BroochResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochNameRoutesEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Services\BroochService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class BroochController extends Controller
{
    public function __construct(public BroochService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BroochCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(BroochStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new BroochResource($model))
            ->response()
            ->header('Location', route(BroochNameRoutesEnum::CRUD_SHOW->value, [
                BroochEnum::PRIMARY_KEY->value => $model->id
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

        return (new BroochResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(BroochUpdateRequest $request, int $id): JsonResponse
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
