<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers;

use App\Http\Admin\Media\MediaVideos\VideoDetails\Requests\VideoDetailStoreRequest;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Requests\VideoDetailUpdateRequest;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Resources\VideoDetailCollection;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Resources\VideoDetailResource;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailNameRoutesEnum;
use Domain\Medias\MediaVideos\VideoDetails\Services\VideoDetailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class VideoDetailController extends Controller
{
    public function __construct(public VideoDetailService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VideoDetailCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(VideoDetailStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new VideoDetailResource($model))
            ->response()
            ->header('Location', route(VideoDetailNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new VideoDetailResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(VideoDetailUpdateRequest $request, int $id): JsonResponse
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
