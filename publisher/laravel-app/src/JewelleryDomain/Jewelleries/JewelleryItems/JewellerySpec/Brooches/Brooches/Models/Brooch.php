<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochEnum;

final class Brooch extends Model
{
    protected $table = BroochEnum::TABLE_NAME->value;
    protected $fillable = ['quantity','price','id', 'dimensions'];

    public const string TYPE_RESOURCE = BroochEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }
}
