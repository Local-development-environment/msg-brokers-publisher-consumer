<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Models\CatalogVideoDetail;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Models\ReviewVideoDetail;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeEnum;

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
