<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\Shared\VideoTypes\Resources;

use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Resources\CatalogVideoDetailCollection;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Resources\ReviewVideoDetailCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeNameRoutesEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeRelationshipsEnum;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VideoType */
final class VideoTypeResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'type'          => VideoType::TYPE_RESOURCE,
            'attributes'    => $this->attributeItems(),
            'relationships' => [
                VideoTypeRelationshipsEnum::CATALOG_VIDEO_DETAILS => $this->sectionRelationships(
                    VideoTypeNameRoutesEnum::RELATED_TO_CATALOG_VIDEO_DETAILS->value,
                    CatalogVideoDetailCollection::class
                ),
                'videoReview'  => $this->sectionRelationships(
                    VideoTypeNameRoutesEnum::RELATED_TO_REVIEW_VIDEO_DETAILS->value,
                    ReviewVideoDetailCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            ReviewVideoDetailCollection::class  => $this->whenLoaded(VideoTypeRelationshipsEnum::VIDEO_DETAILS->value),
            CatalogVideoDetailCollection::class => $this->whenLoaded(VideoTypeRelationshipsEnum::CATALOG_VIDEO_DETAILS->value),
        ];
    }
}
