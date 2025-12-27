<?php
declare(strict_types=1);

namespace Domain\Medias\ReviewMedias\ReviewVideoDetails\Models;

use Domain\Medias\ReviewMedias\ReviewVideoDetails\Enums\ReviewVideoDetailEnum;
use Domain\Medias\ReviewMedias\ReviewVideos\Models\ReviewVideo;
use Domain\Medias\Shared\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ReviewVideoDetail extends Model
{
    protected $table = ReviewVideoDetailEnum::TABLE_NAME->value;
    protected $fillable = ['extension','type'];

    public const string TYPE_RESOURCE = ReviewVideoDetailEnum::TYPE_RESOURCE->value;

    public function videoType(): BelongsTo
    {
        return $this->belongsTo(VideoType::class);
    }

    public function reviewVideo(): BelongsTo
    {
        return $this->belongsTo(ReviewVideo::class);
    }
}
