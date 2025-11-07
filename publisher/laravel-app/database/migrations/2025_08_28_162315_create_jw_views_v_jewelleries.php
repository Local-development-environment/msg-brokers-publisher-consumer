
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
                                when vi.jewellery_id isnull then
                                    jsonb_build_array()
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'insert_id', vi.insert_id,
                                            'insert', vi.insert,
                                            'jewellery_id', vi.jewellery_id,
                                            'insert_exterior_id', vi.insert_exterior_id,
                                            'insert_optional_info_id', vi.insert_optional_info_id,
                                            'insert_optional_info', vi.insert_optional_info,
                                            'insert_metric_id', vi.insert_metric_id,
                                            'quantity_stones', vi.quantity_stones,
                                            'stone_dimension', vi.stone_dimension,
                                            'insert_total_stone_weight', vi.insert_total_stone_weight,
                                            'dominant_weight', vi.dominant_weight,
                                            'unit_stone_weight', vi.unit_stone_weight,
                                            'colour_id', vi.colour_id,
                                            'colour_name', vi.colour_name,
                                            'colour_slug', vi.colour_slug,
                                            'colour_description', vi.colour_description,
                                            'stone_id', vi.stone_id,
                                            'stone_name', vi.stone_name,
                                            'stone_alt_name', vi.stone_alt_name,
                                            'stone_description', vi.stone_description,
                                            'stone_slug', vi.stone_slug,
                                            'facet_id', vi.facet_id,
                                            'facet_name', vi.facet_name,
                                            'facet_slug', vi.facet_slug,
                                            'facet_description', vi.facet_description,
                                            'origin_id', vi.origin_id,
                                            'origin_name', vi.origin_name,
                                            'origin_slug', vi.origin_slug,
                                            'origin_description', vi.origin_description,
                                            'optical_effect_id', vi.optical_effect_id,
                                            'optical_effect_name', vi.optical_effect_name,
                                            'expr_optical_effect', vi.expr_optical_effect,
                                            'stone_grade_id', vi.stone_grade_id,
                                            'stone_grade_name', vi.stone_grade_name,
                                            'stone_grade_description', vi.stone_grade_description,
                                            'stone_group_id', vi.stone_group_id,
                                            'stone_group_name', vi.stone_group_name,
                                            'stone_group_description', vi.stone_group_description,
                                            'stone_family_id', vi.stone_family_id,
                                            'stone_family_name', vi.stone_family_name,
                                            'stone_family_description', vi.stone_family_description,
                                            'dominant_stone', jsonb_build_object(
                                                'weight', vi.dominant_weight,
                                                'stone_id', vi.stone_id,
                                                'stone_name', vi.stone_name,
                                                'colour_id', vi.colour_id,
                                                'colour_name', vi.colour_name
                                            )
                                        )
                                    )
                                end
                            as inserts,
                            j.id as jewellery_id
                        from jewelleries.jewelleries as j
                        left join jw_views.v_inserts as vi on j.id = vi.jewellery_id
                        group by j.id, vi.jewellery_id
                    ),
                    cte_jw_coverages as (
                        select
                            jsonb_agg(
                                jsonb_build_object(
                                    'coverage_id', jwcj.coverage_id,
                                    'coverage', jwc.name,
                                    'coverage_type', ct.name,
                                    'coverage_type_id', ct.id
                                )
                            )
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
                    cte_videos_group as (
                        select
                            jj.id as jewellery_id,
                            v.id as video_id,
                            v.name as name,
                            v.alt_name as alt_name,
                            v.producer_id as producer_id,
                            p.name as producer_name,
                            p.slug as producer_slug,
                            v.is_active as video_active,
                            jsonb_agg(
                                jsonb_build_object(
                                    'type', vt.type,
                                    'extension', vt.extension,
                                    'src', vd.src
                                )
                            ) as types
                        from
                            jewelleries.jewelleries as jj
                        join jw_medias.videos v on jj.id = v.jewellery_id
                        join jw_medias.producers as p on p.id = v.producer_id
                        join jw_medias.video_details vd on v.id = vd.video_id
                        join jw_medias.video_types vt on vd.video_type_id = vt.id
                        group by jj.id, v.name, v.id, p.name, p.slug
                    ),
                    cte_jw_videos as (
                        select
                            case
                                when cvg.jewellery_id isnull then
                                    jsonb_build_array()
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'video_id', cvg.video_id,
                                            'name', cvg.name,
                                            'alt_name', cvg.alt_name,
                                            'video_type', cvg.types,
                                            'producer_id', cvg.producer_id,
                                            'producer_name', cvg.producer_name,
                                            'producer_slug', cvg.producer_slug,
                                            'video_type', cvg.types
                                        )
                                    )
                                end
                            as video_medias,
                            cvg.jewellery_id
                        from
                            cte_videos_group as cvg
                        group by cvg.jewellery_id
                    ),
                    cte_jw_pictures as (
                        select
                            case
                                when p.jewellery_id isnull then
                                    jsonb_build_array()
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'picture_id', p.id,
                                            'name', p.name,
                                            'alt_name', p.alt_name,
                                            'extension', p.extension,
                                            'type', p.type,
                                            'src', p.src,
                                            'producer_id', p.producer_id,
                                            'picture_active', p.is_active,
                                            'producer_name', pr.name,
                                            'producer_slug', pr.slug
                                        )
                                    )
                                end
                            as picture_medias,
                            p.jewellery_id
                        from
                            jewelleries.jewelleries as jj
                        join jw_medias.pictures p on jj.id = p.jewellery_id
                        join jw_medias.producers pr on p.producer_id = pr.id
                        group by p.jewellery_id
                    ),
                    cte_jw_props as (
                        select
                            jj.id,jwb.id as jewellery_id,
                            jsonb_build_object(
                                'brooch_id', jwb.id
                            ) as spec_props,
                            jwb.quantity as quantity,
                            cast(jwb.price as decimal(10, 2)) as avg_price,
                            cast(jwb.price as decimal(10, 2)) as max_price,
                            cast(jwb.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.brooches as jwb
                        join jewelleries.jewelleries as jj on jwb.id = jj.id
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
                            jj.id,jwprc.id as jewellery_id,
                            jsonb_build_object(
                                'piercing_id', jwprc.id
                            ) as spec_props,
                            jwprc.quantity as quantity,
                            cast(jwprc.price as decimal(10, 2)) as avg_price,
                            cast(jwprc.price as decimal(10, 2)) as max_price,
                            cast(jwprc.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.piercings as jwprc
                        join jewelleries.jewelleries as jj on jwprc.id = jj.id
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
                            jj.id,b.id as jewellery_id,
                            jsonb_build_object(
                                'metrics', metrics.metrics,
                                'weaving', weaving.weaving,
                                'clasp_id', b.clasp_id,
                                'clasp_name', c.name,
                                'clasp_description', c.description,
                                'base_id', b.bracelet_base_id,
                                'base_name', bb.name,
                                'body_part_id', b.body_part_id,
                                'body_part_name', bp.name
                            ) as details,
                            sum(brm.quantity) as quantity,
                            cast(avg(brm.price) as decimal(10, 2)) as avg_price,
                            cast(max(brm.price) as decimal(10, 2)) as max_price,
                            cast(min(brm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.bracelets as b
                                join (
                                select
                                    b.id as bracelet_id,
                                    case
                                        when brw.bracelet_id isnull then
                                            jsonb_build_object()
                                        else
                                            jsonb_agg(
                                                jsonb_build_object(
                                                    'base_weaving_id', w.base_weaving_id,
                                                    'base_weaving_name', bw.name,
                                                    'weaving_id', w.id,
                                                    'weaving', w.name,
                                                    'fullness', brw.fullness,
                                                    'wire_diameter', brw.diameter
                                                )
                                            )
                                        end as weaving
                                from
                                    jw_properties.bracelets as b
                                        left join jw_properties.bracelet_weavings as brw on b.id = brw.bracelet_id
                                        left join jw_properties.weavings as w on brw.weaving_id = w.id
                                        left join jw_properties.base_weavings as bw on w.base_weaving_id = bw.id
                                group by b.id, brw.bracelet_id
                            ) as weaving on weaving.bracelet_id = b.id
                                join (
                                select
                                    b.id as bracelet_id,
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'size', bs.value,
                                            'price', brm.price,
                                            'quantity', brm.quantity,
                                            'unit', bs.unit
                                        )
                                    ) as metrics
                                from
                                    jw_properties.bracelets as b
                                        left join jw_properties.bracelet_metrics as brm on b.id = brm.bracelet_id
                                        left join jw_properties.bracelet_sizes as bs on brm.bracelet_size_id = bs.id
                        
                                group by b.id
                            ) as metrics on metrics.bracelet_id = b.id
                                left join jw_properties.clasps as c on c.id = b.clasp_id
                                left join jw_properties.bracelet_bases as bb on bb.id = b.bracelet_base_id
                                left join jw_properties.body_parts as bp on bp.id = b.body_part_id
                                left join jewelleries.jewelleries as jj on b.id = jj.id
                                left join jw_properties.bracelet_metrics as brm on b.id = brm.bracelet_id
                        group by b.id, metrics.metrics, weaving.weaving, jj.id, c. name, bb.name, bp.name, c.description
                        
                        union all
                        
                        select
                            jj.id,ch.id as jewellery_id,
                            jsonb_build_object(
                                'metrics', metrics.metrics,
                                'weaving', weaving.weaving,
                                'clasp_id', ch.clasp_id,
                                'clasp_name', c.name,
                                'clasp_description', c.description
                            ) as details,
                            sum(chm.quantity) as quantity,
                            cast(avg(chm.price) as decimal(10, 2)) as avg_price,
                            cast(max(chm.price) as decimal(10, 2)) as max_price,
                            cast(min(chm.price) as decimal(10, 2)) as min_price
                        from
                            jw_properties.chains as ch
                                join (
                                select
                                    ch.id as chain_id,
                                    case
                                        when chw.chain_id isnull then
                                            jsonb_build_object()
                                        else
                                            jsonb_agg(
                                                jsonb_build_object(
                                                    'base_weaving_id', w.base_weaving_id,
                                                    'base_weaving_name', bw.name,
                                                    'weaving_id', w.id,
                                                    'weaving', w.name,
                                                    'fullness', chw.fullness,
                                                    'wire_diameter', chw.diameter
                                                )
                                            )
                                        end as weaving
                                from
                                    jw_properties.chains as ch
                                        left join jw_properties.chain_weavings as chw on ch.id = chw.chain_id
                                        left join jw_properties.weavings as w on chw.weaving_id = w.id
                                        left join jw_properties.base_weavings as bw on w.base_weaving_id = bw.id
                                group by ch.id, chw.chain_id
                            ) as weaving on weaving.chain_id = ch.id
                                join (
                                select
                                    ch.id as chain_id,
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'size', ns.value,
                                            'price', chm.price,
                                            'quantity', chm.quantity,
                                            'unit', ns.unit,
                                            'length_name_id', lnm.id,
                                            'length_name', lnm.name,
                                            'length_description', lnm.description
                                        )
                                    ) as metrics
                                from
                                    jw_properties.chains as ch
                                        left join jw_properties.chain_metrics as chm on ch.id = chm.chain_id
                                        left join jw_properties.neck_sizes as ns on chm.neck_size_id = ns.id
                                        join jw_properties.length_names as lnm on ns.length_name_id = lnm.id
                                group by ch.id
                            ) as metrics on metrics.chain_id = ch.id
                                join jw_properties.clasps as c on c.id = ch.clasp_id
                                left join jewelleries.jewelleries as jj on ch.id = jj.id
                                left join jw_properties.chain_metrics as chm on ch.id = chm.chain_id
                        group by ch.id, metrics.metrics, weaving.weaving, jj.id, c.name, c.description
                        
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
                    case
                        when cjp.spec_props isnull then
                            jsonb_build_object()
                        else
                            cjp.spec_props
                        end
                    as spec_props,
                    case 
                        when cjwc.coverages isnull 
                            then jsonb_build_array()
                        else
                            cjwc.coverages
                        end
                    as coverages,
                    cjwi.inserts,
                    cgv.video_medias,
                    cp.picture_medias,
                    cast(dominant_data->>'weight' as decimal(10, 2)) as dominant_weight,
                    cast(dominant_data->>'stone_id' as integer) as dominant_stone_id,
                    cast(dominant_data->>'stone_name' as varchar(256)) as dominant_stone_name,
                    cast(dominant_data->>'colour_id' as integer) as dominant_colour_id,
                    cast(dominant_data->>'colour_name' as varchar(256)) as dominant_colour_name,
                    cjm.metals
                from jewelleries.jewelleries as jj
                join jewelleries.categories as jc on jj.category_id = jc.id
                left join cte_jw_inserts as cjwi on jj.id = cjwi.jewellery_id
                left join cte_jw_coverages as cjwc on jj.id = cjwc.jewellery_id
                left join cte_jw_metals as cjm on jj.id = cjm.jewellery_id
                left join cte_jw_props as cjp on  jj.id = cjp.jewellery_id
                left join cte_jw_videos as cgv on jj.id = cgv.jewellery_id
                left join cte_jw_pictures as cp on jj.id = cp.jewellery_id
                left join jsonb_path_query(cjwi.inserts, '$[*].dominant_stone ? (@.weight != null)') as dominant_data on jj.id = cjwi.jewellery_id
                
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
