
<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            <<<'SQL'
            CREATE MATERIALIZED VIEW jw_views.v_jewelleries AS
                with
                    cte_jw_inserts as (
                        select
                            case
                                when jwvi.jewellery_id isnull then
                                    null
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'stone', jsonb_build_object(
                                                'id', jwvi.id,
                                                'name', jwvi.stone_name,
                                                'alt_name', jwvi.stone_alt_name,
                                                'description', jwvi.stone_description
                                                         ),
                                            'origin', jsonb_build_object(
                                                'id', jwvi.origin_id,
                                                'name', jwvi.origin_name,
                                                'description', jwvi.origin_description
                                            ),
                                            'opt_effect', jsonb_build_object(
                                                'name', jwvi.optical_effect_name,
                                                'description', jwvi.optical_effect_description,
                                                'id', jwvi.optical_effect_id
                                            ),
                                            'classification', jsonb_build_object(
                                                'grade_name', jwvi.stone_grade_name,
                                                'grade_description', jwvi.stone_grade_description,
                                                'grade_id', jwvi.stone_grade_id,
                                                'group_name', jwvi.stone_group_name,
                                                'group_description', jwvi.stone_group_description,
                                                'group_id', jwvi.stone_group_id
                                            ),
                                            'family', jsonb_build_object(
                                                'name', jwvi.stone_family_name,
                                                'description', jwvi.stone_family_description,
                                                'id', jwvi.stone_family_id
                                            ),
                                            'exterior', jsonb_build_object(
                                                'id', jwvi.stone_colour_id,
                                                'colour', jwvi.stone_colour_name,
                                                'colour_description', jwvi.stone_colour_description,
                                                'id', stone_facet_id,
                                                'facet', jwvi.stone_facet_name,
                                                'facet_description', jwvi.stone_facet_description
                                            ),
                                            'inserts', jsonb_build_object(
                                                'insert_id', jwvi.id,
                                                'quantity', jwvi.stone_quantity,
                                                'weight', jwvi.stone_weight,
                                                'unit', jwvi.stone_unit,
                                                'dimensions', jwvi.stone_dimensions,
                                                'optional_info', jwvi.stone_optional_info
                                            )
                                        )
                                    )
                                end
                            as inserts,
                            jj.id as jewellery_id
                        from jewelleries.jewelleries as jj
                        left join jw_views.v_inserts as jwvi on jj.id = jwvi.jewellery_id
                        group by jj.id,jwvi.jewellery_id
                    ),
                    cte_jw_coverages as (
                        select
                            case
                                when jwcj.jewellery_id isnull then
                                    null
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'coverage_id', jwcj.coverage_id,
                                            'coverage', jwc.name,
                                            'coverage_type', ct.name,
                                            'coverage_type_id', ct.id
                                        )
                                    )
                                end
                            as coverages,
                            jj.id as jewellery_id
                        from
                            jewelleries.jewelleries as jj
                        left join jw_coverages.coverage_jewellery jwcj on jj.id = jwcj.jewellery_id
                        join jw_coverages.coverages as jwc on jwcj.coverage_id = jwc.id
                        join jw_coverages.coverage_types ct on jwc.coverage_type_id = ct.id
                        group by jj.id,jwcj.jewellery_id
                    ),
                    cte_jw_metals as (
                        select
                            case
                                when jwjmd.jewellery_id isnull then
                                    null
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'metal_details_id', jwjmd.metal_detail_id,
                                            'metal_details', concat_ws(' ',jwm.name,'цвет',jwc.name,'проба',jwh.value),
                                            'metal_id', jwm.id,
                                            'metal', jwm.name,
                                            'colour_id', jwc.id,
                                            'colour', jwc.name,
                                            'hallmark_id', jwh.id,
                                            'hallmark', jwh.value
                                        )
                                    )
                                end
                            as metals,
                            jj.id as jewellery_id
                        from
                            jewelleries.jewelleries as jj
                        left join jw_metals.jewellery_metal_detail as jwjmd on jj.id = jwjmd.jewellery_id
                        left join jw_metals.metal_details as jwmd on jwjmd.metal_detail_id = jwmd.id
                        join jw_metals.metals jwm on jwmd.metal_id = jwm.id
                        join jw_metals.colours jwc on jwmd.colour_id = jwc.id
                        join jw_metals.hallmarks jwh on jwmd.hallmark_id = jwh.id
                        group by jj.id,jwjmd.jewellery_id
                    )
                
                select
                    jj.id,
                    jj.category_id,
                    jc.name as category,
                    jj.name,
                    jj.slug,
                    jj.description,
                    jj.part_number,
                    jj.approx_weight,
                    jj.is_active,
                    jj.created_at,
                    jj.updated_at,
                    cjwi.inserts,
                    cjwc.coverages,
                    cjm.metals
                from jewelleries.jewelleries as jj
                join jewelleries.categories as jc on jj.category_id = jc.id
                left join cte_jw_inserts as cjwi on jj.id = cjwi.jewellery_id
                left join cte_jw_coverages as cjwc on jj.id = cjwc.jewellery_id
                left join cte_jw_metals as cjm on jj.id = cjm.jewellery_id
                            
                with data
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP MATERIALIZED VIEW jw_views.v_jewelleries;');
    }
};
