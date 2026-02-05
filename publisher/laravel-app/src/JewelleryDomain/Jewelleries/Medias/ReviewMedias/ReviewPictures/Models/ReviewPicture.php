<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Enums\ReviewPictureEnum;

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
