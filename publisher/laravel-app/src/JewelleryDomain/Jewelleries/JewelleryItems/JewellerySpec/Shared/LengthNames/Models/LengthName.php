<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

final class LengthName extends Model
{
    protected $table = LengthNameEnum::TABLE_NAME->value;
    protected $fillable = ['name', 'slug', 'description'];

    public const string TYPE_RESOURCE = LengthNameEnum::TYPE_RESOURCE->value;

    public function neckSizes(): HasMany
    {
        return $this->hasMany(NeckSize::class);
    }
}
