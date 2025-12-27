<?php
declare(strict_types=1);

namespace Domain\Medias\ReviewMedias\ReviewPictures\Models;

use Domain\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use Domain\Medias\ReviewMedias\ReviewPictures\Enums\ReviewPictureEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ReviewPicture extends Model
{
    protected $table = ReviewPictureEnum::TABLE_NAME->value;
    protected $fillable = ['alt_name','is_active','extension','src'];

    public const string TYPE_RESOURCE = ReviewPictureEnum::TYPE_RESOURCE->value;

    public function reviewMedia(): BelongsTo
    {
        return $this->belongsTo(ReviewMedia::class);
    }
}
