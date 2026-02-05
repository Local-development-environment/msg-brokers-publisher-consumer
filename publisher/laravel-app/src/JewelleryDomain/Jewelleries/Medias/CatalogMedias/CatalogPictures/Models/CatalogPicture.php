<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Models\CatalogMedia;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureEnum;

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
