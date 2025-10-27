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
            CREATE MATERIALIZED VIEW jw_views.v_inserts AS
            with
                cte_inserts as (
                    select
                        i.id,
                        i.jewellery_id,
                        st.id as stone_id,
                        st.name as stone_name,
                        concat(
                            st.name, ', ', oe.name, ', ', jwto.name, ', ', sgr.name, ', ', sg.name, ', ', 
                            'разновидность: ', sf.name, ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                            ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                        ) as stone_full_name,
                        st.alt_name as stone_alt_name,
                        st.description as stone_description,
                        jwto.id as origin_id,
                        jwto.name as origin_name,
                        jwto.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        sg.id as stone_grade_id,
                        sg.name as stone_grade_name,
                        sg.description as stone_grade_description,
                        sgr.id as stone_group_id,
                        sgr.name as stone_group_name,
                        sgr.description as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description,
                        ic.id as stone_colour_id,
                        ic.name as stone_colour_name,
                        ic.description as stone_colour_description,
                        ifc.id as stone_facet_id,
                        ifc.name as stone_facet_name,
                        ifc.description as stone_facet_description,
                        im.id as insert_metric_id,
                        im.quantity as insert_metric_quantity,
                        im.weight as insert_metric_weight,
                        im.unit as insert_metric_unit,
                        im.dimensions as insert_metric_dimensions,
                        oi.info as insert_optional_info
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.natural_stones as ns on st.id = ns.id
                    join jw_inserts.stone_groups as sgr on ns.stone_group_id = sgr.id
                    join jw_inserts.stone_families as sf on ns.stone_family_id = sf.id
                    left join jw_inserts.natural_stone_grade as nsg on ns.id = nsg.id
                    left join jw_inserts.stone_grades as sg on nsg.stone_grade_id = sg.id
                    join jw_inserts.insert_exteriors as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as oi on i.id = oi.id

                    union all

                    select
                        i.id,
                        i.jewellery_id,
                        st.id as stone_id,
                        st.name as stone_name,
                        concat(
                            st.name, ', ', oe.name, ', ', jwto.name, ', ', 
                            'разновидность: ', sf.name, ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                            ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                        ) as full_name,
                        st.alt_name as stone_alt_name,
                        st.description as stone_description,
                        jwto.id as origin_id,
                        jwto.name as origin_name,
                        jwto.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description,
                        ic.id as stone_colour_id,
                        ic.name as stone_colour_name,
                        ic.description as stone_colour_description,
                        ifc.id as stone_facet_id,
                        ifc.name as stone_facet_name,
                        ifc.description as stone_facet_description,
                        im.id as insert_metric_id,
                        im.quantity as insert_metric_quantity,
                        im.weight as insert_metric_weight,
                        im.unit as insert_metric_unit,
                        im.dimensions as insert_metric_dimensions,
                        oi.info as insert_optional_info
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.grown_stones as grs on st.id = grs.id
                    join jw_inserts.stone_families as sf on grs.stone_family_id = sf.id
                    join jw_inserts.insert_exteriors as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as oi on i.id = oi.id

                    union all

                    select
                        i.id,
                        i.jewellery_id,
                        st.id as stone_id,
                        st.name as stone_name,
                        concat(
                            st.name, ', ', oe.name, ', ', jwto.name, ', ', 
                            ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                            ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                        ) as stone_full_name,
                        st.alt_name as stone_alt_name,
                        st.description as stone_description,
                        jwto.id as origin_id,
                        jwto.name as origin_name,
                        jwto.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        null as stone_family_id,
                        null as stone_family_name,
                        null as stone_family_description,
                        ic.id as stone_colour_id,
                        ic.name as stone_colour_name,
                        ic.description as stone_colour_description,
                        ifc.id as stone_facet_id,
                        ifc.name as stone_facet_name,
                        ifc.description as stone_facet_description,
                        im.id as insert_metric_id,
                        im.quantity as insert_metric_quantity,
                        im.weight as insert_metric_weight,
                        im.unit as insert_metric_unit,
                        im.dimensions as insert_metric_dimensions,
                        oi.info as insert_optional_info
                    from
                        jw_inserts.stones as st
                    join jw_inserts.type_origins as jwto on st.type_origin_id = jwto.id
                    left join jw_inserts.optical_effect_stone as oes on st.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.imitation_stones as ims on st.id = ims.id
                    join jw_inserts.insert_exteriors as ist on st.id = ist.stone_id
                    join jw_inserts.colours as ic on ist.colour_id = ic.id
                    join jw_inserts.facets as ifc on ist.facet_id = ifc.id
                    join jw_inserts.inserts as i on ist.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as oi on i.id = oi.id
                )
            select
                ci.id,
                ci.jewellery_id,
                ci.stone_id,
                ci.stone_name,
                ci.stone_full_name,
                ci.stone_alt_name,
                ci.stone_description,
                ci.origin_id,
                ci.origin_name,
                ci.origin_description,
                ci.optical_effect_id,
                ci.optical_effect_name,
                ci.optical_effect_description,
                ci.stone_grade_id,
                ci.stone_grade_name,
                ci.stone_grade_description,
                ci.stone_group_id,
                ci.stone_group_name,
                ci.stone_group_description,
                ci.stone_family_id,
                ci.stone_family_name,
                ci.stone_family_description,
                ci.stone_colour_id,
                ci.stone_colour_name,
                ci.stone_colour_description,
                ci.stone_facet_id,
                ci.stone_facet_name,
                ci.stone_facet_description,
                ci.insert_metric_id,
                ci.insert_metric_quantity,
                ci.insert_metric_weight,
                ci.insert_metric_unit,
                ci.insert_metric_dimensions,
                case
                    when ci.insert_optional_info isnull then
                        jsonb_build_object()
                    else
                        ci.insert_optional_info
                    end
                as insert_optional_info,
                cast(weights.weight * ci.insert_metric_quantity as decimal(8,3)) as max_weight
            from
                cte_inserts as ci
            left join
                (
                    select
                        jewellery_id,
                        max(insert_metric_weight/insert_metric_quantity) as weight
                    from cte_inserts
                    group by jewellery_id
                ) as weights
                    on ci.jewellery_id = weights.jewellery_id
                    and ci.insert_metric_weight/ci.insert_metric_quantity = weights.weight
            with data
            
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP MATERIALIZED VIEW jw_views.v_inserts;');
    }
};
