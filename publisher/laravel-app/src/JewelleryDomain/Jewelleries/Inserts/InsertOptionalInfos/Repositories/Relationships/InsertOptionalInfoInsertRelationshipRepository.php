<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;

final class InsertOptionalInfoInsertRelationshipRepository
{
    public function index(int $id): Insert
    {
        return InsertOptionalInfo::findOrFail($id)->insert;
    }
}
