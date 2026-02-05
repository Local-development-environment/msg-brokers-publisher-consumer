<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Enums\ReviewVideoDetailEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Models\ReviewVideo;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Models\VideoType;

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
