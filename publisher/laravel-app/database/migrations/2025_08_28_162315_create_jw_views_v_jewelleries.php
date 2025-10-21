
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
                                                'id', jwvi.stone_id,
                                                'name', jwvi.stone_name,
                                                'alt_name', jwvi.stone_alt_name,
                                                'description', jwvi.stone_description,
                                                'colour_id', jwvi.stone_colour_id,
                                                'max_weight', jwvi.max_weight
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
                                                'colour_id', jwvi.stone_colour_id,
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
                    ),
                    cte_jw_props as (
                        select
                            jj.id,jwb.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'brooch_id', jwb.id
                            ) as spec_props,
                            jwb.quantity as quantity,
                            cast(jwb.price as decimal(10, 2)) as avg_price,
                            cast(jwb.price as decimal(10, 2)) as max_price,
                            cast(jwb.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.brooches as jwb
                        join jewelleries.jewelleries as jj on jwb.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all

                        select
                            jj.id,jwchp.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'charm_pendant_id', jwchp.id
                            ) as spec_props,
                            jwchp.quantity as quantity,
                            cast(jwchp.price as decimal(10, 2)) as avg_price,
                            cast(jwchp.price as decimal(10, 2)) as max_price,
                            cast(jwchp.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.charm_pendants as jwchp
                        join jewelleries.jewelleries as jj on jwchp.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all

                        select
                            jj.id,jwtc.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'tie_clip_id', jwtc.id
                            ) as spec_props,
                            jwtc.quantity as quantity,
                            cast(jwtc.price as decimal(10, 2)) as avg_price,
                            cast(jwtc.price as decimal(10, 2)) as max_price,
                            cast(jwtc.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.tie_clips as jwtc
                        join jewelleries.jewelleries as jj on jwtc.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all

                        select
                            jj.id,jwp.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'pendant_id', jwp.id
                            ) as spec_props,
                            jwp.quantity as quantity,
                            cast(jwp.price as decimal(10, 2)) as avg_price,
                            cast(jwp.price as decimal(10, 2)) as max_price,
                            cast(jwp.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.pendants as jwp
                        join jewelleries.jewelleries as jj on jwp.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all 
                        
                        select
                            jj.id,jwcl.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'cuff_links_id', jwcl.id
                            ) as spec_props,
                            jwcl.quantity as quantity,
                            cast(jwcl.price as decimal(10, 2)) as avg_price,
                            cast(jwcl.price as decimal(10, 2)) as max_price,
                            cast(jwcl.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.cuff_links as jwcl
                        join jewelleries.jewelleries as jj on jwcl.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all 
                        
                        select
                            jj.id,jwprc.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'piercing_id', jwprc.id
                            ) as spec_props,
                            jwprc.quantity as quantity,
                            cast(jwprc.price as decimal(10, 2)) as avg_price,
                            cast(jwprc.price as decimal(10, 2)) as max_price,
                            cast(jwprc.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.piercings as jwprc
                        join jewelleries.jewelleries as jj on jwprc.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        
                        union all 
                        
                        select
                            jj.id,jwerr.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'earring_id', jwerr.id,
                                'earring_clasp_id', jwerc.id,
                                'earring_clasp', jwerc.name,
                                'earring_type_id', jwet.id,
                                'earring_type', jwet.name
                            ) as spec_props,
                            jwerr.quantity as quantity,
                            cast(jwerr.price as decimal(10, 2)) as avg_price,
                            cast(jwerr.price as decimal(10, 2)) as max_price,
                            cast(jwerr.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.earrings as jwerr
                        join jewelleries.jewelleries as jj on jwerr.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.earring_clasps as jwerc on jwerr.earring_clasp_id = jwerc.id
                        join jw_properties.earring_earring_type as jweet on jwerr.id = jweet.earring_id
                        join jw_properties.earring_types as jwet on jweet.earring_type_id = jwet.id
                        
                        union all
                        
                        select
                            jj.id,jwrng.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'ring_id', jwrng.id,
                                'ring_finger_id', jwrf.id,
                                'ring_finger', jwrf.name,
                                'dimensions', jwrng.dimensions,
                                'size_price_quantity',
                                jsonb_agg(
                                    jsonb_build_object(
                                        'size', jwrs.value,
                                        'price', jwrm.price,
                                        'quantity', jwrm.quantity
                                    )
                                )
                            ) as spec_props,
                            sum(jwrm.quantity) as quantity,
                            cast(avg(jwrm.price) as decimal(10, 2)) as avg_price,
                            cast(max(jwrm.price) as decimal(10, 2)) as max_price,
                            cast(min(jwrm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.rings as jwrng
                        join jewelleries.jewelleries as jj on jwrng.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.ring_fingers as jwrf on jwrng.ring_finger_id = jwrf.id
                        left join jw_properties.ring_metrics as jwrm on jwrng.id = jwrm.ring_id
                        left join jw_properties.ring_sizes as jwrs on jwrm.ring_size_id = jwrs.id
                        group by jj.id,jwrng.jewellery_id,jwrng.id,jwrf.id
                        
                        union all

                        select
                            jj.id,jwbrc.jewellery_id as jewellery_id,
                            jsonb_build_object(
                                'bracelet_id', jwbrc.id,
                                'body_part_id', jwbp.id,
                                'body_part', jwbp.name,
                                'weaving_id', jww.id,
                                'weaving', jww.name,
                                'clasp_id', jwcls.id,
                                'clasp', jwcls.name,
                                'base_id', jwbb.id,
                                'base', jwbb.name,
                                'size_price_quantity',
                                jsonb_agg(
                                    jsonb_build_object(
                                        'size', jwbs.value,
                                        'price', jwbm.price,
                                        'quantity', jwbm.quantity
                                    )
                                )
                            ) as spec_props,
                            sum(jwbm.quantity) as quantity,
                            cast(avg(jwbm.price) as decimal(10, 2)) as avg_price,
                            cast(max(jwbm.price) as decimal(10, 2)) as max_price,
                            cast(min(jwbm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.bracelets as jwbrc
                        join jewelleries.jewelleries as jj on jwbrc.jewellery_id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.body_parts as jwbp on jwbrc.body_part_id = jwbp.id
                        join jw_properties.bracelet_bases as jwbb on jwbrc.bracelet_base_id = jwbb.id
                        join jw_properties.clasps as jwcls on jwbrc.clasp_id = jwcls.id
                        left join jw_properties.bracelet_metrics as jwbm on jwbrc.id = jwbm.bracelet_id
                        left join jw_properties.bracelet_sizes as jwbs on jwbm.bracelet_size_id = jwbs.id
                        left join jw_properties.bracelet_weavings as jwbw on jwbrc.id = jwbw.bracelet_id
                        left join jw_properties.weavings as jww on jwbw.weaving_id = jww.id
                        group by jj.id,jwbrc.jewellery_id,jwbrc.id,jwbp.id,jww.id,jwcls.id,jwbb.id
                        
                        union all
                        
                        select
                            jj.id,jwch.id as jewellery_id,
                            jsonb_build_object(
                                    'chain_id', jwch.id,
                                    'weaving_id', jww.id,
                                    'weaving', jww.name,
                                    'clasp_id', jwcls.id,
                                    'clasp', jwcls.name,
                                    'size_price_quantity',
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'size', jwns.value,
                                            'price', jwchm.price,
                                            'quantity', jwchm.quantity,
                                            'length_name_id', jwln.id,
                                            'length_name', jwln.name
                                        )
                                    )
                            ) as spec_props,
                            sum(jwchm.quantity) as quantity,
                            cast(avg(jwchm.price) as decimal(10, 2)) as avg_price,
                            cast(max(jwchm.price) as decimal(10, 2)) as max_price,
                            cast(min(jwchm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.chains as jwch
                        join jewelleries.jewelleries as jj on jwch.id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.clasps as jwcls on jwch.clasp_id = jwcls.id
                        left join jw_properties.chain_metrics as jwchm on jwch.id = jwchm.chain_id
                        left join jw_properties.neck_sizes as jwns on jwchm.neck_size_id = jwns.id
                        join jw_properties.length_names as jwln on jwns.length_name_id = jwln.id
                        left join jw_properties.chain_weavings as jwchw on jwch.id = jwchw.id
                        left join jw_properties.weavings as jww on jwchw.weaving_id = jww.id
                        group by jj.id,jwch.id,jwch.id,jww.id,jwcls.id
                        
                        union all

                        select
                            jj.id,jwnck.id as jewellery_id,
                            jsonb_build_object(
                                'necklace_id', jwnck.id,
                                'clasp_id', jwcls.id,
                                'clasp', jwcls.name,
                                'size_price_quantity',
                                jsonb_agg(
                                    jsonb_build_object(
                                        'size', jwns.value,
                                        'price', jwnckm.price,
                                        'quantity', jwnckm.quantity,
                                        'length_name_id', jwln.id,
                                        'length_name', jwln.name
                                    )
                                )
                            ) as spec_props,
                            sum(jwnckm.quantity) as quantity,
                            cast(avg(jwnckm.price) as decimal(10, 2)) as avg_price,
                            cast(max(jwnckm.price) as decimal(10, 2)) as max_price,
                            cast(min(jwnckm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.necklaces as jwnck
                        join jewelleries.jewelleries as jj on jwnck.id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.clasps as jwcls on jwnck.clasp_id = jwcls.id
                        left join jw_properties.necklace_metrics as jwnckm on jwnck.id = jwnckm.necklace_id
                        left join jw_properties.neck_sizes as jwns on jwnckm.neck_size_id = jwns.id
                        join jw_properties.length_names as jwln on jwns.length_name_id = jwln.id
                        group by jj.id,jwnck.id,jwnck.id,jwcls.id
                    
                        union all
                    
                        select
                            jj.id,jwbd.id as jewellery_id,
                            jsonb_build_object(
                                'bead_id', jwbd.id,
                                'clasp_id', jwcls.id,
                                'clasp', jwcls.name,
                                'base_id', jwbb.id,
                                'base', jwbb.name,
                                'size_price_quantity',
                                jsonb_agg(
                                    jsonb_build_object(
                                        'size', jwns.value,
                                        'price', jwbdm.price,
                                        'quantity', jwbdm.quantity,
                                        'length_name_id', jwln.id,
                                        'length_name', jwln.name
                                    )
                                )
                            ) as spec_props,
                            sum(jwbdm.quantity) as quantity,
                            cast(avg(jwbdm.price) as decimal(10, 2)) as avg_price,
                            cast(max(jwbdm.price) as decimal(10, 2)) as max_price,
                            cast(min(jwbdm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.beads as jwbd
                        join jewelleries.jewelleries as jj on jwbd.id = jj.id
                        join jewelleries.categories as jc on jj.category_id = jc.id
                        join jw_properties.bead_bases as jwbb on jwbd.bead_base_id = jwbb.id
                        join jw_properties.clasps as jwcls on jwbd.clasp_id = jwcls.id
                        left join jw_properties.bead_metrics as jwbdm on jwbd.id = jwbdm.bead_id
                        left join jw_properties.neck_sizes as jwns on jwbdm.neck_size_id = jwns.id
                        join jw_properties.length_names as jwln on jwns.length_name_id = jwln.id
                        group by jj.id,jwbd.id,jwcls.id,jwbb.id
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
                    cjp.quantity,
                    cjp.avg_price,
                    cjp.max_price,
                    cjp.min_price,
                    cjp.spec_props,
                    cjwi.inserts,
                    cjwc.coverages,
                    cast(stone_max_weight_id as integer) as stone_max_weight_id,
                    cast(stone_max_colour_id as integer) as stone_max_colour_id,
                    cjm.metals
                from jewelleries.jewelleries as jj
                join jewelleries.categories as jc on jj.category_id = jc.id
                left join cte_jw_inserts as cjwi on jj.id = cjwi.jewellery_id
                left join cte_jw_coverages as cjwc on jj.id = cjwc.jewellery_id
                left join cte_jw_metals as cjm on jj.id = cjm.jewellery_id
                left join cte_jw_props as cjp on  jj.id = cjp.jewellery_id
                left join jsonb_path_query(cjwi.inserts, '$[*].stone ? (@.max_weight != null) .id') as stone_max_weight_id on jj.id = cjwi.jewellery_id
                left join jsonb_path_query(cjwi.inserts, '$[*].stone ? (@.max_weight != null) .colour_id') as stone_max_colour_id on jj.id = cjwi.jewellery_id
                order by jj.id
                
                with data;
            SQL
        );

        DB::statement(
            'CREATE UNIQUE INDEX ON jw_views.v_jewelleries(id)'
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
