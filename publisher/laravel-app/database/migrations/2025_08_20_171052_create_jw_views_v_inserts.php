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
                        jsonb_agg(
                            jsonb_build_object(
                                'stone', jsonb_build_object(
                                    'id', st.id,
                                    'name', st.name,
                                    'full_name', concat(
                                        st.name, ', ', oe.name, ', ', jwto.name, ', ', sgr.name, ', ', sg.name, ', ', 
                                        'разновидность: ', sf.name, ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                                        ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                                    ),
                                    'alt_name', st.alt_name,
                                    'description', st.description
                                ),
                                'origin', jsonb_build_object(
                                    'name', jwto.name,
                                    'description',jwto.description
                                ),
                                'opt_effect', jsonb_build_object(
                                    'name', oe.name,
                                    'description', oe.description,
                                    'id', oe.id
                                ),
                                'classification', jsonb_build_object(
                                    'grade_name', sg.name,
                                    'grade_description', sg.description,
                                    'grade_id', sg.id,
                                    'group_name', sgr.name,
                                    'group_description', sgr.description,
                                    'group_id', sgr.id
                                ),
                                'family', jsonb_build_object(
                                    'name', sf.name,
                                    'description', sf.description,
                                    'id', sf.id
                                ),
                                'exterior', jsonb_build_object(
                                    'colour', ic.name,
                                    'colour_description', ic.description,
                                    'facet', ifc.name,
                                    'facet_description', ifc.description
                                ),
                                'inserts', jsonb_build_object(
                                    'insert_id', i.id,
                                    'quantity', im.quantity,
                                    'weight', im.weight,
                                    'unit', im.unit,
                                    'dimensions', im.dimensions,
                                    'optional_info', oi.info
                                )
                            )
                        ) as insert_details
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
                    left join jw_inserts.optional_infos as oi on i.id = oi.insert_id
                    group by i.jewellery_id

                    union all

                    select
                        jsonb_agg(
                            jsonb_build_object(
                                'stone', jsonb_build_object(
                                    'id', st.id,
                                    'name', st.name,
                                    'full_name', concat(
                                        st.name, ', ', oe.name, ', ', jwto.name, ', ', null, ', ', null, ', ', 
                                        'разновидность: ', sf.name, ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                                        ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                                    ),
                                    'alt_name', st.alt_name,
                                    'description', st.description
                                ),
                                'origin', jsonb_build_object(
                                    'name', jwto.name,
                                    'description',jwto.description
                                ),
                                'opt_effect', jsonb_build_object(
                                    'name', oe.name,
                                    'description', oe.description,
                                    'id', oe.id
                                ),
                                'classification', jsonb_build_object(
                                    'grade_name', null,
                                    'grade_description', null,
                                    'grade_id', null,
                                    'group_name', null,
                                    'group_description', null,
                                    'group_id', null
                                ),
                                'family', jsonb_build_object(
                                    'name', sf.name,
                                    'description', sf.description,
                                    'id', sf.id
                                ),
                                'exterior', jsonb_build_object(
                                    'colour', ic.name,
                                    'colour_description', ic.description,
                                    'facet', ifc.name,
                                    'facet_description', ifc.description
                                ),
                                'inserts', jsonb_build_object(
                                    'insert_id', i.id,
                                    'quantity', im.quantity,
                                    'weight', im.weight,
                                    'unit', im.unit,
                                    'dimensions', im.dimensions,
                                    'optional_info', oi.info
                                )
                            )
                        ) as insert_details
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
                    left join jw_inserts.optional_infos as oi on i.id = oi.insert_id
                    group by i.jewellery_id

                    union all

                    select
                        jsonb_agg(
                            jsonb_build_object(
                                'stone', jsonb_build_object(
                                    'id', st.id,
                                    'name', st.name,
                                    'full_name', concat(
                                        st.name, ', ', oe.name, ', ', jwto.name, ', ', null, ', ', null, ', ', 
                                        'разновидность: ', null, ', цвет: ', ic.name, ', огранка: ', ifc.name, 
                                        ', кол-во: ', im.quantity, ', вес: ', im.weight, ' ', im.unit
                                    ),
                                    'alt_name', st.alt_name,
                                    'description', st.description
                                ),
                                'origin', jsonb_build_object(
                                    'name', jwto.name,
                                    'description',jwto.description
                                ),
                                'opt_effect', jsonb_build_object(
                                    'name', oe.name,
                                    'description', oe.description,
                                    'id', oe.id
                                ),
                                'classification', jsonb_build_object(
                                    'grade_name', null,
                                    'grade_description', null,
                                    'grade_id', null,
                                    'group_name', null,
                                    'group_description', null,
                                    'group_id', null
                                ),
                                'family', jsonb_build_object(
                                    'name', null,
                                    'description', null,
                                    'id', null
                                ),
                                'exterior', jsonb_build_object(
                                    'colour', ic.name,
                                    'colour_description', ic.description,
                                    'facet', ifc.name,
                                    'facet_description', ifc.description
                                ),
                                'inserts', jsonb_build_object(
                                    'insert_id', i.id,
                                    'quantity', im.quantity,
                                    'weight', im.weight,
                                    'unit', im.unit,
                                    'dimensions', im.dimensions,
                                    'optional_info', oi.info
                                )
                            )
                        ) as insert_details
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
                    left join jw_inserts.optional_infos as oi on i.id = oi.insert_id
                    group by i.jewellery_id
                )
            select
                cs.insert_details
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
