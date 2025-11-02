<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaPictures\Pictures\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\Media\Producers\Resources\ProducerResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureNameRoutesEnum;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureRelationshipsEnum;
use Domain\Medias\MediaPictures\Pictures\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Picture */
final class PictureResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => Picture::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    PictureNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                ),
                'producer' => $this->sectionRelationships(
                    PictureNameRoutesEnum::RELATED_TO_PRODUCER->value,
                    ProducerResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(PictureRelationshipsEnum::JEWELLERY->value),
            ProducerResource::class => $this->whenLoaded(PictureRelationshipsEnum::PRODUCER->value),
        ];
    }
}
