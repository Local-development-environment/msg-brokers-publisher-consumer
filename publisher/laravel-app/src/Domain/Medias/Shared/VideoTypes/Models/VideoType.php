<?php
declare(strict_types=1);

namespace Domain\Medias\Shared\VideoTypes\Models;

use Domain\Medias\CatalogMedias\CatalogVideoDetails\Models\CatalogVideoDetail;
use Domain\Medias\ReviewMedias\ReviewVideoDetails\Models\ReviewVideoDetail;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class VideoType extends Model
{
    protected $table = VideoTypeEnum::TABLE_NAME->value;
    protected $fillable = ['extension','type'];

    public const string TYPE_RESOURCE = VideoTypeEnum::TYPE_RESOURCE->value;

    public function catalogVideoDetails(): HasMany
    {
        return $this->hasMany(CatalogVideoDetail::class);
    }

    public function reviewVideoDetails(): HasMany
    {
        return $this->hasMany(ReviewVideoDetail::class);
    }
}
