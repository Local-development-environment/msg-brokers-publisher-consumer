<?php
declare(strict_types=1);

namespace Domain\Medias\MediaReviews\MediaReviews\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\Medias\MediaReviews\MediaReviews\Enums\MediaReviewEnum;
use Domain\Medias\Shared\MediaTypes\Models\MediaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class MediaReview extends Model
{
    protected $table = MediaReviewEnum::TABLE_NAME->value;

    protected $fillable = ['jewellery_id','media_type_id','name','slug','is_active'];

    public const string TYPE_RESOURCE = MediaReviewEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function mediaType(): BelongsTo
    {
        return $this->belongsTo(MediaType::class);
    }
}
