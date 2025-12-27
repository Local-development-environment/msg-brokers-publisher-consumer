<?php
declare(strict_types=1);

namespace Domain\Medias\CatalogMedias\CatalogPictures\Models;

use Domain\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use Domain\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CatalogPicture extends Model
{
    protected $table = CatalogPictureEnum::TABLE_NAME->value;

    protected $fillable = ['alt_name','extension','src','is_active'];

    public const string TYPE_RESOURCE = CatalogPictureEnum::TYPE_RESOURCE->value;

    public function catalogMedia(): BelongsTo
    {
        return $this->belongsTo(CatalogMedia::class);
    }
}
