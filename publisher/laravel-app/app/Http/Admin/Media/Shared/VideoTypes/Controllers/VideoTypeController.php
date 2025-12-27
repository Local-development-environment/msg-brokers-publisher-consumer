<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Controllers;

use App\Http\Admin\Media\MediaVideos\Videos\Requests\VideoTypeStoreRequest;
use App\Http\Admin\Media\Shared\VideoTypes\Requests\VideoTypeUpdateRequest;
use App\Http\Admin\Media\Shared\VideoTypes\Resources\VideoTypeCollection;
use App\Http\Admin\Media\Shared\VideoTypes\Resources\VideoTypeResource;
use App\Http\Controllers\Controller;
use Domain\Medias\Shared\MediaTypes\Services\MediaTypeService;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeNameRoutesEnum;
use Domain\Medias\Shared\VideoTypes\Services\VideoTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class VideoTypeController extends Controller
{
    public function __construct(public VideoTypeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VideoTypeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(VideoTypeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new VideoTypeResource($model))
            ->response()
            ->header('Location', route(VideoTypeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new VideoTypeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(VideoTypeUpdateRequest $request, int $id): JsonResponse
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
