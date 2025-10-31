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
                        i.id as insert_id,
                        i.jewellery_id as jewellery_id,
                        i.insert_exterior_id as insert_exterior_id,
                        ioi.id as insert_optional_info_id,
                        ioi.info as insert_optional_info,
                        im.id as insert_metric_id,
                        im.quantity as quantity_stones,
                        im.dimensions as stone_dimension,
                        im.weight as insert_total_stone_weight,
                        im.unit as unit_stone_weight,
                        c.id as colour_id,
                        c.name as colour_name,
                        c.slug as colour_slug,
                        c.description as colour_description,
                        s.id as stone_id,
                        s.name as stone_name,
                        s.alt_name as stone_alt_name,
                        s.description as stone_description,
                        s.slug as stone_slug,
                        f.id as facet_id,
                        f.name as facet_name,
                        f.slug as facet_slug,
                        f.description as facet_description,
                        tor.id as origin_id,
                        tor.name as origin_name,
                        tor.slug as origin_slug,
                        tor.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        case
                            when oes.optical_effect_id isnull then
                                'без оптического эффекта'
                            else
                                concat_ws(' ', 'с оптическим эффектом', oe.name)
                            end
                        as expr_optical_effect,
                        sg.id as stone_grade_id,
                        sg.name as stone_grade_name,
                        sg.description as stone_grade_description,
                        sgr.id as stone_group_id,
                        sgr.name as stone_group_name,
                        sgr.description as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description
                    from
                        jw_inserts.stones as s
                    join jw_inserts.type_origins as tor on s.type_origin_id = tor.id
                    left join jw_inserts.optical_effect_stone as oes on s.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.natural_stones as ns on s.id = ns.id
                    join jw_inserts.stone_groups as sgr on ns.stone_group_id = sgr.id
                    join jw_inserts.stone_families as sf on ns.stone_family_id = sf.id
                    left join jw_inserts.natural_stone_grade as nsg on ns.id = nsg.id
                    left join jw_inserts.stone_grades as sg on nsg.stone_grade_id = sg.id
                    join jw_inserts.insert_exteriors as iex on s.id = iex.stone_id
                    join jw_inserts.colours as c on iex.colour_id = c.id
                    join jw_inserts.facets as f on iex.facet_id = f.id
                    join jw_inserts.inserts as i on iex.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as ioi on i.id = ioi.id

                    union all

                    select
                        i.id as insert_id,
                        i.jewellery_id as jewellery_id,
                        i.insert_exterior_id as insert_exterior_id,
                        ioi.id as insert_optional_info_id,
                        ioi.info as insert_optional_info,
                        im.id as insert_metric_id,
                        im.quantity as quantity_stones,
                        im.dimensions as stone_dimension,
                        im.weight as insert_total_stone_weight,
                        im.unit as unit_stone_weight,
                        c.id as colour_id,
                        c.name as colour_name,
                        c.slug as colour_slug,
                        c.description as colour_description,
                        s.id as stone_id,
                        s.name as stone_name,
                        s.alt_name as stone_alt_name,
                        s.description as stone_description,
                        s.slug as stone_slug,
                        f.id as facet_id,
                        f.name as facet_name,
                        f.slug as facet_slug,
                        f.description as facet_description,
                        tor.id as origin_id,
                        tor.name as origin_name,
                        tor.slug as origin_slug,
                        tor.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        case
                            when oes.optical_effect_id isnull then
                                'без оптического эффекта'
                            else
                                concat_ws(' ', 'с оптическим эффектом', oe.name)
                            end
                        as expr_opt_effect,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        sf.id as stone_family_id,
                        sf.name as stone_family_name,
                        sf.description as stone_family_description
                    from
                        jw_inserts.stones as s
                    join jw_inserts.type_origins as tor on s.type_origin_id = tor.id
                    left join jw_inserts.optical_effect_stone as oes on s.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.grown_stones as grs on s.id = grs.id
                    join jw_inserts.stone_families as sf on grs.stone_family_id = sf.id
                    join jw_inserts.insert_exteriors as iex on s.id = iex.stone_id
                    join jw_inserts.colours as c on iex.colour_id = c.id
                    join jw_inserts.facets as f on iex.facet_id = f.id
                    join jw_inserts.inserts as i on iex.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as ioi on i.id = ioi.id

                    union all

                    select
                        i.id as insert_id,
                        i.jewellery_id as jewellery_id,
                        i.insert_exterior_id as insert_exterior_id,
                        ioi.id as insert_optional_info_id,
                        ioi.info as insert_optional_info,
                        im.id as insert_metric_id,
                        im.quantity as quantity_stones,
                        im.dimensions as stone_dimension,
                        im.weight as insert_total_stone_weight,
                        im.unit as unit_stone_weight,
                        c.id as colour_id,
                        c.name as colour_name,
                        c.slug as colour_slug,
                        c.description as colour_description,
                        s.id as stone_id,
                        s.name as stone_name,
                        s.alt_name as stone_alt_name,
                        s.description as stone_description,
                        s.slug as stone_slug,
                        f.id as facet_id,
                        f.name as facet_name,
                        f.slug as facet_slug,
                        f.description as facet_description,
                        tor.id as origin_id,
                        tor.name as origin_name,
                        tor.slug as origin_slug,
                        tor.description as origin_description,
                        oe.id as optical_effect_id,
                        oe.name as optical_effect_name,
                        oe.description as optical_effect_description,
                        case
                            when oes.optical_effect_id isnull then
                                'без оптического эффекта'
                            else
                                concat_ws(' ', 'с оптическим эффектом', oe.name)
                            end
                        as expr_opt_effect,
                        null as stone_grade_id,
                        null as stone_grade_name,
                        null as stone_grade_description,
                        null as stone_group_id,
                        null as stone_group_name,
                        null as stone_group_description,
                        null as stone_family_id,
                        null as stone_family_name,
                        null as stone_family_description
                    from
                        jw_inserts.stones as s
                    join jw_inserts.type_origins as tor on s.type_origin_id = tor.id
                    left join jw_inserts.optical_effect_stone as oes on s.id = oes.id
                    left join jw_inserts.optical_effects as oe on oes.optical_effect_id = oe.id
                    join jw_inserts.imitation_stones as ims on s.id = ims.id
                    join jw_inserts.insert_exteriors as iex on s.id = iex.stone_id
                    join jw_inserts.colours as c on iex.colour_id = c.id
                    join jw_inserts.facets as f on iex.facet_id = f.id
                    join jw_inserts.inserts as i on iex.id = i.insert_exterior_id
                    join jw_inserts.insert_metrics as im on i.id = im.id
                    left join jw_inserts.insert_optional_infos as ioi on i.id = ioi.id
                )
            select
                ci.insert_id,
                ci.jewellery_id,
                ci.insert_exterior_id,
                ci.insert_optional_info_id,
                ci.insert_optional_info,
                ci.insert_metric_id,
                ci.quantity_stones,
                ci.stone_dimension,
                ci.insert_total_stone_weight,
                ci.unit_stone_weight,
                ci.colour_id,
                ci.colour_name,
                ci.colour_slug,
                ci.colour_description,
                ci.stone_id,
                ci.stone_name,
                ci.stone_alt_name,
                ci.stone_description,
                ci.stone_slug,
                ci.facet_id,
                ci.facet_name,
                ci.facet_slug,
                ci.facet_description,
                ci.origin_id,
                ci.origin_name,
                ci.origin_slug,
                ci.origin_description,
                ci.optical_effect_id,
                ci.optical_effect_name,
                ci.optical_effect_description,
                concat_ws(
                    ' ', 'камень', ci.origin_name, ci.stone_name, 'цвет', ci.colour_name, 'огранка', ci.facet_name,
                    ci.expr_optical_effect
                ) as insert,
                ci.expr_optical_effect,
                ci.stone_grade_id,
                ci.stone_grade_name,
                ci.stone_grade_description,
                ci.stone_group_id,
                ci.stone_group_name,
                ci.stone_group_description,
                ci.stone_family_id,
                ci.stone_family_name,
                ci.stone_family_description,
                cast(weights.weight * ci.quantity_stones as decimal(8,3)) as dominant_weight
            from
                cte_inserts as ci
            left join
                (
                    select
                        jewellery_id,
                        max(insert_total_stone_weight/quantity_stones) as weight
                    from cte_inserts
                    group by jewellery_id
                ) as weights
                    on ci.jewellery_id = weights.jewellery_id
                    and ci.insert_total_stone_weight/ci.quantity_stones = weights.weight
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
