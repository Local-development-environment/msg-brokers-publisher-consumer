<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseBuildEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeBuilderEnum;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingEnum;
use Domain\JewelleryProperties\Brooches\BroochClasps\Enums\BroochClaspBuilderEnum;
use Domain\JewelleryProperties\Brooches\BroochClasps\Enums\BroochClaspEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochEnum;
use Domain\JewelleryProperties\Brooches\BroochTypes\Enums\BroochTypeBuilderEnum;
use Domain\JewelleryProperties\Brooches\BroochTypes\Enums\BroochTypeEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkClasps\Enums\CuffLinkClaspEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums\CuffLinkFormBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums\CuffLinkFormEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinks\Enums\CuffLinkEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeBuilderEnum;
use Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums\CuffLinkTypeEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringClasps\Enums\EarringClaspEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeBuilderEnum;
use Domain\JewelleryProperties\Earrings\EarringTypes\Enums\EarringTypeEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceEnum;
use Domain\JewelleryProperties\Pendants\Pendants\Enums\PendantEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingEnum;
use Domain\JewelleryProperties\Piercings\PiercingSites\Enums\PiercingSiteBuilderEnum;
use Domain\JewelleryProperties\Piercings\PiercingSites\Enums\PiercingSiteEnum;
use Domain\JewelleryProperties\Piercings\PiercingSuitable\Enums\PiercingSuitableEnum;
use Domain\JewelleryProperties\Piercings\PiercingTypes\Enums\PiercingTypeBuilderEnum;
use Domain\JewelleryProperties\Piercings\PiercingTypes\Enums\PiercingTypeEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerBuilderEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\RingMetrics\Enums\RingMetricEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeEnum;
use Domain\JewelleryProperties\Rings\RingSpecifics\Enums\RingSpecificBuilderEnum;
use Domain\JewelleryProperties\Rings\RingSpecifics\Enums\RingSpecificEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeBuilderEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeEnum;
use Domain\JewelleryProperties\TieClips\TieClips\Enums\TieClipEnum;
use Domain\JewelleryProperties\TieClips\TieClipTypes\Enums\TieClipTypeBuilderEnum;
use Domain\JewelleryProperties\TieClips\TieClipTypes\Enums\TieClipTypeEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingBuilderEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspBuilderEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameBuilderEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeBuilderEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingBuilderEnum;
use Domain\Shared\JewelleryProperties\Weavings\Enums\WeavingEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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

        Schema::enableForeignKeyConstraints();

        foreach (BraceletTypeBuilderEnum::cases() as $braceletBase) {
            DB::table(BraceletTypeEnum::TABLE_NAME->value)->insert([
                'name' => $braceletBase->value,
                'slug' => Str::slug($braceletBase->value),
                'description' => $braceletBase->description(),
                'created_at' => now(),
            ]);
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
        DB::table(RingFingerEnum::TABLE_NAME->value)->truncate();
        DB::table(RingMetricEnum::TABLE_NAME->value)->truncate();
        DB::table(RingDetailEnum::TABLE_NAME->value)->truncate();
        DB::table(RingSizeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingTypeEnum::TABLE_NAME->value)->truncate();
        DB::table(RingSpecificEnum::TABLE_NAME->value)->truncate();

        Schema::enableForeignKeyConstraints();

        foreach (RingFingerBuilderEnum::cases() as $case) {
            DB::table(RingFingerEnum::TABLE_NAME->value)->insert([
                'name' => $case->value,
                'slug' => Str::slug($case->value),
                'created_at' => now(),
            ]);
        }

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
