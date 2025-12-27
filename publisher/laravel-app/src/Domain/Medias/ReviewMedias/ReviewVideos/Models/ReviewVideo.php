<?php
declare(strict_types=1);

namespace Domain\Medias\ReviewMedias\ReviewVideos\Models;

use Domain\Medias\ReviewMedias\ReviewMedias\Models\ReviewMedia;
use Domain\Medias\ReviewMedias\ReviewVideoDetails\Models\ReviewVideoDetail;
use Domain\Medias\ReviewMedias\ReviewVideos\Enums\ReviewVideoEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
