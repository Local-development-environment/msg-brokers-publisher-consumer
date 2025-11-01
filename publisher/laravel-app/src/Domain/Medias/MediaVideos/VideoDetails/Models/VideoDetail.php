<?php
declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoDetails\Models;

use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailEnum;
use Domain\Medias\MediaVideos\Videos\Models\Video;
use Domain\Medias\MediaVideos\VideoTypes\Models\VideoType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class VideoDetail extends Model
{
    protected $table = VideoDetailEnum::TABLE_NAME->value;
    protected $fillable = ['video_type_id','video_id','src'];

    public const string TYPE_RESOURCE = VideoDetailEnum::TYPE_RESOURCE->value;

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }

    public function videoType(): BelongsTo
    {
        return $this->belongsTo(VideoType::class);
    }
}
