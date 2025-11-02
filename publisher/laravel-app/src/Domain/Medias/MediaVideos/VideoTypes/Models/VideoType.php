<?php
declare(strict_types=1);

namespace Domain\Medias\MediaVideos\VideoTypes\Models;

use Domain\Medias\MediaVideos\VideoDetails\Models\VideoDetail;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class VideoType extends Model
{
    protected $table = VideoTypeEnum::TABLE_NAME->value;
    protected $fillable = ['extension','type'];

    public const string TYPE_RESOURCE = VideoTypeEnum::TYPE_RESOURCE->value;

    public function videoDetails(): HasMany
    {
        return $this->hasMany(VideoDetail::class);
    }
}
