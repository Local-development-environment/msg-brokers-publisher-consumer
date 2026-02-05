<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseBuildEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletGroups\Enums\BraceletGroupBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletGroups\Enums\BraceletGroupEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Enums\BraceletEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochClasps\Enums\BroochClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochClasps\Enums\BroochClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums\BroochTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\BroochTypes\Enums\BroochTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkForms\Enums\CuffLinkFormBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkForms\Enums\CuffLinkFormEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinks\Enums\CuffLinkEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringClasps\Enums\EarringClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Earrings\EarringTypes\Enums\EarringTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Enums\NecklaceEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums\PiercingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSites\Enums\PiercingSiteBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSites\Enums\PiercingSiteEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSuitable\Enums\PiercingSuitableEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums\PiercingTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums\PiercingTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Enums\RingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSpecifics\Enums\RingSpecificBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSpecifics\Enums\RingSpecificEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums\RingTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Enums\RingTypeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClipTypes\Enums\TieClipTypeBuilderEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClipTypes\Enums\TieClipTypeEnum;

/**
 *
 */
final class InitProperties
{
    public function initBeadProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(BeadEnum::TABLE_NAME->value)->truncate();
        DB::table(BeadBaseEnum::TABLE_NAME->value)->truncate();
        DB::table(BeadMetricEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (BeadBaseBuildEnum::cases() as $beadBase) {
            DB::table(BeadBaseEnum::TABLE_NAME->value)->insert([
                'name' => $beadBase->value,
                'slug' => Str::slug($beadBase->value),
                'description' => $beadBase->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initBraceletProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(BraceletEnum::TABLE_NAME->value)->truncate();
        DB::table(BodyPartEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletMetricEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(BraceletGroupEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (BraceletGroupBuilderEnum::cases() as $braceletBase) {
            $braceletGroupId = DB::table(BraceletGroupEnum::TABLE_NAME->value)->insertGetId([
                'name' => $braceletBase->value,
                'slug' => Str::slug($braceletBase->value),
                'description' => $braceletBase->description(),
                'created_at' => now(),
            ]);

            if ($braceletBase->value === BraceletGroupBuilderEnum::SOFT->value) {
                foreach (BraceletGroupBuilderEnum::SOFT->types() as $braceletType) {
                    $description = BraceletTypeBuilderEnum::from($braceletType)->description();
                    DB::table(BraceletTypeEnum::TABLE_NAME->value)->insert([
                        'bracelet_group_id' => $braceletGroupId,
                        'name' => $braceletType,
                        'slug' => Str::slug($braceletType),
                        'description' => $description,
                        'created_at' => now(),
                    ]);
                }
            } else {
                foreach (BraceletGroupBuilderEnum::HARD->types() as $braceletType) {
                    $description = BraceletTypeBuilderEnum::from($braceletType)->description();
                    DB::table(BraceletTypeEnum::TABLE_NAME->value)->insert([
                        'bracelet_group_id' => $braceletGroupId,
                        'name' => $braceletType,
                        'slug' => Str::slug($braceletType),
                        'description' => $description,
                        'created_at' => now(),
                    ]);
                }
            }
        }

        foreach (BraceletSizeBuilderEnum::cases() as $braceletSize) {
            DB::table(BraceletSizeEnum::TABLE_NAME->value)->insert([
                'value' => $braceletSize->value,
                'unit' => $braceletSize->unitMeasurement(),
                'annotation' => $braceletSize->wrist(),
                'created_at' => now(),
            ]);
        }

        foreach (BodyPartBuilderEnum::cases() as $bodyPart) {
            DB::table(BodyPartEnum::TABLE_NAME->value)->insert([
                'name' => $bodyPart->value,
                'slug' => Str::slug($bodyPart->value),
                'created_at' => now(),
            ]);
        }
    }

    public function initShareProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(ClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(BaseWeavingEnum::TABLE_NAME->value)->truncate();
        DB::table(LengthNameEnum::TABLE_NAME->value)->truncate();
        DB::table(NeckSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(WeavingEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (ClaspBuilderEnum::cases() as $braceletBase) {
            DB::table(ClaspEnum::TABLE_NAME->value)->insert([
                'name' => $braceletBase->value,
                'slug' => Str::slug($braceletBase->value),
                'description' => $braceletBase->description(),
                'created_at' => now(),
            ]);
        }

        foreach (BaseWeavingBuilderEnum::cases() as $baseWeaving) {
            DB::table(BaseWeavingEnum::TABLE_NAME->value)->insert([
                'name' => $baseWeaving->value,
                'slug' => Str::slug($baseWeaving->value),
                'description' => $baseWeaving->description(),
                'created_at' => now(),
            ]);
        }

        foreach (WeavingBuilderEnum::cases() as $case) {
            $baseWeaving = $case::{$case->name}->baseWeaving();
            DB::table(WeavingEnum::TABLE_NAME->value)->insert([
                'base_weaving_id' => DB::table(BaseWeavingEnum::TABLE_NAME->value)->where('name', $baseWeaving)->value('id'),
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (LengthNameBuilderEnum::cases() as $case) {
            DB::table(LengthNameEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (NeckSizeBuilderEnum::cases() as $case) {
            $lengthName = $case::{$case->name}->lengthNames();
            DB::table(NeckSizeEnum::TABLE_NAME->value)->insert([
                'length_name_id' => DB::table(LengthNameEnum::TABLE_NAME->value)->where('name', $lengthName)->value('id'),
                'value' => $case->value,
                'unit' => $case->unitMeasurement(),
                'created_at' => now(),
            ]);
        }
    }

    public function initEarringProperties(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table(EarringClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(EarringTypeEnum::TABLE_NAME->value)->truncate();
        Schema::enableForeignKeyConstraints();

        foreach (EarringClaspBuilderEnum::cases() as $case) {
            DB::table(EarringClaspEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (EarringTypeBuilderEnum::cases() as $case) {
            DB::table(EarringTypeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }
    }

    public function initNecklaceProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(NecklaceEnum::TABLE_NAME->value)->truncate();
        DB::table(NecklaceMetricEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();
    }

    public function initCharmPendantProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(CharmPendantEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();
    }

    public function initPendantProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(PendantEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();
    }

    public function initRingProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(RingEnum::TABLE_NAME->value)->truncate();
        DB::table(RingMetricEnum::TABLE_NAME->value)->truncate();
        DB::table(RingDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(RingSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingSpecificEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (RingTypeBuilderEnum::cases() as $case) {
            DB::table(RingTypeEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (RingSpecificBuilderEnum::cases() as $case) {
            DB::table(RingSpecificEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'description' => $case->description(),
                'created_at' => now(),
            ]);
        }

        foreach (RingSizeBuilderEnum::cases() as $case) {
            DB::table(RingSizeEnum::TABLE_NAME->value)->insert([
                'value' => $case->value,
                'unit' => $case->unitMeasurement(),
                'created_at' => now(),
            ]);
        }
    }

    public function initCuffLinkProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(CuffLinkEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkFormEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(CuffLinkTypeEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (CuffLinkClaspBuilderEnum::cases() as $cuff_link_clasp) {
            DB::table(CuffLinkClaspEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_clasp->value,
                'slug'        => Str::slug($cuff_link_clasp->value, '-'),
                'description' => $cuff_link_clasp->description(),
                'created_at'  => now()
            ]);
        }

        foreach (CuffLinkFormBuilderEnum::cases() as $cuff_link_form) {
            DB::table(CuffLinkFormEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_form->value,
                'slug'        => Str::slug($cuff_link_form->value, '-'),
                'description' => $cuff_link_form->description(),
                'created_at'  => now()
            ]);
        }

        foreach (CuffLinkTypeBuilderEnum::cases() as $cuff_link_clasp) {
            DB::table(CuffLinkTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_clasp->value,
                'slug'        => Str::slug($cuff_link_clasp->value, '-'),
                'description' => $cuff_link_clasp->description(),
                'created_at'  => now()
            ]);
        }
    }

    public function initPiercingProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(PiercingEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingSuitableEnum::TABLE_NAME->value)->truncate();
        DB::table(PiercingSiteEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (PiercingSiteBuilderEnum::cases() as $piercing_site) {
            $piercingSiteId = DB::table(PiercingSiteEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $piercing_site->value,
                'slug'        => Str::slug($piercing_site->value, '-'),
                'description' => $piercing_site->description(),
                'created_at'  => now()
            ]);
        }

        foreach (PiercingTypeBuilderEnum::cases() as $piercing_type) {

            $piercingTypeId = DB::table(PiercingTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $piercing_type->value,
                'slug'        => Str::slug($piercing_type->value, '-'),
                'description' => $piercing_type->description(),
                'created_at'  => now()
            ]);

            foreach ($piercing_type->suitable() as $suitable) {
                DB::table(PiercingSuitableEnum::TABLE_NAME->value)->insertGetId([
                    'piercing_type_id'        => $piercingTypeId,
                    'piercing_site_id'        => DB::table(PiercingSiteEnum::TABLE_NAME->value)
                        ->where('name', $suitable)->value('id'),
                    'created_at'  => now()
                ]);
            }
        }
    }

    public function initBroochProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(BroochTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(BroochClaspEnum::TABLE_NAME->value)->truncate();
        DB::table(BroochEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (BroochClaspBuilderEnum::cases() as $cuff_link_form) {
            DB::table(BroochClaspEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_form->value,
                'slug'        => Str::slug($cuff_link_form->value, '-'),
                'description' => $cuff_link_form->description(),
                'created_at'  => now()
            ]);
        }

        foreach (BroochTypeBuilderEnum::cases() as $cuff_link_type) {
            DB::table(BroochTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $cuff_link_type->value,
                'slug'        => Str::slug($cuff_link_type->value, '-'),
                'description' => $cuff_link_type->description(),
                'created_at'  => now()
            ]);
        }
    }

    public function initTieClipProperties(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table(TieClipTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(TieClipEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (TieClipTypeBuilderEnum::cases() as $tie_clip_type) {
            DB::table(TieClipTypeEnum::TABLE_NAME->value)->insertGetId([
                'name'        => $tie_clip_type->value,
                'slug'        => Str::slug($tie_clip_type->value, '-'),
                'description' => $tie_clip_type->description(),
                'created_at'  => now()
            ]);
        }
    }
}
