<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Models\ReviewVideoDetail;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums\ReviewVideoEnum;

final class ReviewVideo extends Model
{
    protected $table = ReviewVideoEnum::TABLE_NAME->value;
    protected $fillable = ['alt_name','is_active'];

    public const string TYPE_RESOURCE = ReviewVideoEnum::TYPE_RESOURCE->value;

    public function reviewMedia(): BelongsTo
    {
        return $this->belongsTo(ReviewMedia::class);
    }

    public function reviewDetailVideos(): HasMany
    {
        return $this->hasMany(ReviewVideoDetail::class);
    }
}
