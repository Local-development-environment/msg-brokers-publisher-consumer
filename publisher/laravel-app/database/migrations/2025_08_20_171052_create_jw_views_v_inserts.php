<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            <<<'SQL'
            CREATE VIEW jw_views.v_inserts AS
            with
                cte_stones as (
                    select
                        st.id as st_id,
                        st.name as st_name,
                        st.alt_name as st_alt_name,
                        st.description as st_description,
                        st.type_origin_id as st_origin_id,
                        jwto.name as st_origin_name,
                        jwto.description as st_origin_description,
                        oe.name as opt_effect_name,
                        oe.description as opt_effect_description,
                        oe.id as opt_effect_id,
                        sg.id as stone_grade_id,
                        sg.name as stone_grade_name,
                        sg.description as stone_grade_description,
                        sgr.id as stone_group_id,
                        sgr.name as stone_group_name,
                        sgr.description as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description,
                        ic.id as colour_id,
                        ic.name as colour_name,
                        ifc.id as facet_id,
                        ifc.name as facet_name,
                        i.id as insert_id,
                        im.quantity as quantity,
                        im.weight as weight,
                        im.unit as unit,
                        im.dimensions as dimensions
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.stone_id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.natural_stones as ns on st.id = ns.stone_id
                    join jw_inserts.stone_groups as sgr on ns.stone_group_id = sgr.id
                    join jw_inserts.stone_families as sf on ns.stone_family_id = sf.id
                    left join jw_inserts.natural_stone_grade as nsg on ns.id = nsg.natural_stone_id
                    left join jw_inserts.stone_grades as sg on nsg.stone_grade_id = sg.id
                    join jw_inserts.insert_stones as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_stone_id
                    join jw_inserts.metrics as im on i.metric_id = im.id

                    union all

                    select
                        st.id as st_id,
                        st.name as st_name,
                        st.alt_name as st_alt_name,
                        st.description as st_description,
                        st.type_origin_id as st_origin_id,
                        jwto.name as st_origin_name,
                        jwto.description as st_origin_description,
                        oe.name as opt_effect_name,
                        oe.description as opt_effect_description,
                        oe.id as opt_effect_id,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description,
                        ic.id as colour_id,
                        ic.name as colour_name,
                        ifc.id as facet_id,
                        ifc.name as facet_name,
                        i.id as insert_id,
                        im.quantity as quantity,
                        im.weight as weight,
                        im.unit as unit,
                        im.dimensions as dimensions
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.stone_id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.grown_stones as grs on st.id = grs.stone_id
                    join jw_inserts.stone_families as sf on grs.stone_family_id = sf.id
                    join jw_inserts.insert_stones as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_stone_id
                    join jw_inserts.metrics as im on i.metric_id = im.id

                    union all

                    select
                        st.id as st_id,
                        st.name as st_name,
                        st.alt_name as st_alt_name,
                        st.description as st_description,
                        st.type_origin_id as st_origin_id,
                        jwto.name as st_origin_name,
                        jwto.description as st_origin_description,
                        oe.name as opt_effect_name,
                        oe.description as opt_effect_description,
                        oe.id as opt_effect_id,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        null as stone_family_id,
                        null as stone_family_name,
                        null as stone_family_description,
                        ic.id as colour_id,
                        ic.name as colour_name,
                        ifc.id as facet_id,
                        ifc.name as facet_name,
                        i.id as insert_id,
                        im.quantity as quantity,
                        im.weight as weight,
                        im.unit as unit,
                        im.dimensions as dimensions
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.stone_id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.imitation_stones as ims on st.id = ims.stone_id
                    join jw_inserts.insert_stones as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_stone_id
                    join jw_inserts.metrics as im on i.metric_id = im.id
                )
            select
                jsonb_build_object(
                    'id', cs.st_id,
                    'name', cs.st_name,
                    'alt_name', cs.st_alt_name,
                    'description', cs.st_description
                ) as stone,
                jsonb_build_object(
                    'id', cs.st_origin_id,
                    'name', cs.st_origin_name,
                    'description', cs.st_origin_description
                ) as origin,
                jsonb_build_object(
                    'id', cs.opt_effect_id,
                    'name', cs.opt_effect_name,
                    'description', cs.opt_effect_description
                ) as opt_effect,
                jsonb_build_object(
                    'id', cs.stone_family_id,
                    'name', cs.stone_family_name,
                    'description', cs.stone_family_description
                ) as stone_family,
                jsonb_build_object(
                    'grade_id', cs.stone_grade_id,
                    'grade_name', cs.stone_grade_name,
                    'grade_description', cs.stone_grade_description,
                    'group_id', cs.stone_group_id,
                    'group_name', cs.stone_group_name,
                    'group_description', cs.stone_group_description
                ) as classification
            from
                cte_stones as cs
            -- where stone_group_id = 1
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW jw_views.v_inserts;');
    }
};
