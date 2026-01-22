
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
                    cte_jw_coverages as (
                        select
                            jsonb_agg(
                                jsonb_build_object(
                                    'coverage_id', jc.coverage_id,
                                    'coverage', c.name,
                                    'coverage_description', c.description
                                )
                            )
                                as coverages,
                            jc.jewellery_id as jewellery_id
                        from
                            jewelleries.jewelleries as jj
                                left join jw_metals.jewellery_coverages jc on jj.id = jc.jewellery_id
                                left join jw_metals.coverages as c on jc.coverage_id = c.id
                        group by jj.id,jc.jewellery_id
                    ),
                    cte_jw_metals as (
                        select
                            case
                                when jm.id isnull then
                                    null
                                else
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'precious_metal', pm.id,
                                            'precious_metal_id', pm.name,
                                            'hallmark_id', h.id,
                                            'hallmark', h.value
                                        )
                                    )
                                end
                                  as metals,
                            jj.id as jewellery_id
                        from
                            jewelleries.jewelleries as jj
                                left join jw_metals.jewellery_metals as jm on jj.id = jm.id
                                left join jw_metals.hallmarks as h on jm.hallmark_id = h.id
                                left join jw_metals.precious_metals as pm on jm.precious_metal_id = pm.id
                        group by jj.id,jm.id
                    ),
                    cte_media_review as (
                        select
                            rp.id,
                            rp.alt_name,
                            rp.is_active,
                            jsonb_agg(
                                jsonb_build_object(
                                    'src', rp.src,
                                    'ext', rp.extension
                                )
                            ) as metadata
                        from
                            jw_medias.review_pictures rp
                        group by rp.id

                        union all

                        select
                            rv.id,
                            rv.alt_name,
                            rv.is_active,
                            jsonb_agg(
                                jsonb_build_object(
                                    'src', rvd.src,
                                    'ext', vt.extension,
                                    'type', vt.type
                                )
                            ) as metadata
                        from
                            jw_medias.review_videos rv
                                join jw_medias.review_video_details rvd on rv.id = rvd.review_video_id
                                join jw_medias.video_types vt on vt.id = rvd.video_type_id
                        group by rv.id
                    ),
                    cte_review as (
                        select
                            rm.jewellery_id,
                            jsonb_agg(
                                jsonb_build_object(
                                    'media_id', cmr.id,
                                    mt.name, cmr.metadata,
                                    'alt_name', cmr.alt_name,
                                    'is_active', cmr.is_active
                                )
                            ) media_review
                        from
                            cte_media_review as cmr
                                join jw_medias.review_medias rm on cmr.id = rm.id
                                join jw_medias.media_types mt on rm.media_type_id = mt.id
                        group by rm.jewellery_id
                    ),
                    cte_media_catalog as (
                        select
                            cp.id,
                            cp.alt_name,
                            cp.is_active,
                            jsonb_agg(
                                jsonb_build_object(
                                    'src', cp.src,
                                    'ext', cp.extension
                                )
                            ) as metadata
                        from
                            jw_medias.catalog_pictures cp
                        group by cp.id

                        union all

                        select
                            cv.id,
                            cv.alt_name,
                            cv.is_active,
                            jsonb_agg(
                                jsonb_build_object(
                                    'src', cvd.src,
                                    'ext', vt.extension,
                                    'type', vt.type
                                )
                            ) as metadata
                        from
                            jw_medias.catalog_videos cv
                                join jw_medias.catalog_video_details cvd on cv.id = cvd.catalog_video_id
                                join jw_medias.video_types vt on vt.id = cvd.video_type_id
                        group by cv.id
                    ),
                    cte_catalog as (
                        select
                            cm.jewellery_id,
                            jsonb_agg(
                                jsonb_build_object(
                                    'media_id', cmc.id,
                                    mt.name, cmc.metadata,
                                    'alt_name', cmc.alt_name,
                                    'is_active', cmc.is_active
                                )
                            ) media_catalog
                        from
                            cte_media_catalog as cmc
                                join jw_medias.catalog_medias cm on cmc.id = cm.id
                                join jw_medias.media_types mt on cm.media_type_id = mt.id
                        group by cm.jewellery_id
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
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id

                         union all

                        select
                            jj.id,jwchp.id as jewellery_id,
                            jsonb_build_object(
                                    'charm_pendant_id', jwchp.id
                            ) as spec_props,
                            jwchp.quantity as quantity,
                            cast(jwchp.price as decimal(10, 2)) as avg_price,
                            cast(jwchp.price as decimal(10, 2)) as max_price,
                            cast(jwchp.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.charm_pendants as jwchp
                                join jewelleries.jewelleries as jj on jwchp.id = jj.id
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id

                        union all

                        select
                            jj.id,jwtc.id as jewellery_id,
                            jsonb_build_object(
                                    'tie_clip_id', jwtc.id
                            ) as spec_props,
                            jwtc.quantity as quantity,
                            cast(jwtc.price as decimal(10, 2)) as avg_price,
                            cast(jwtc.price as decimal(10, 2)) as max_price,
                            cast(jwtc.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.tie_clips as jwtc
                                join jewelleries.jewelleries as jj on jwtc.id = jj.id
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id

                        union all

                        select
                            jj.id,jwp.id as jewellery_id,
                            jsonb_build_object(
                                    'pendant_id', jwp.id
                            ) as spec_props,
                            jwp.quantity as quantity,
                            cast(jwp.price as decimal(10, 2)) as avg_price,
                            cast(jwp.price as decimal(10, 2)) as max_price,
                            cast(jwp.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.pendants as jwp
                                join jewelleries.jewelleries as jj on jwp.id = jj.id
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id

                        union all

                        select
                            jj.id,jwcl.id as jewellery_id,
                            jsonb_build_object(
                                'cuff_links_id', jwcl.id,
                                'cuff_link_clasp', jclc.name,
                                'cuff_link_form', jclf.name,
                                'cuff_link_type', jclt.name
                            ) as spec_props,
                            jwcl.quantity as quantity,
                            cast(jwcl.price as decimal(10, 2)) as avg_price,
                            cast(jwcl.price as decimal(10, 2)) as max_price,
                            cast(jwcl.price as decimal(10, 2)) as min_price
                        from
                            jw_properties.cuff_links as jwcl
                                join jewelleries.jewelleries as jj on jwcl.id = jj.id
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id
                                join jw_properties.cuff_link_clasps as jclc on jwcl.cuff_link_clasp_id = jclc.id
                                join jw_properties.cuff_link_forms as jclf on jwcl.cuff_link_clasp_id = jclf.id
                                join jw_properties.cuff_link_types as jclt on jwcl.cuff_link_clasp_id = jclt.id

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
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id

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
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id
                                join jw_properties.earring_clasps as jwerc on jwerr.earring_clasp_id = jwerc.id
                                join jw_properties.earring_earring_type as jweet on jwerr.id = jweet.earring_id
                                join jw_properties.earring_types as jwet on jweet.earring_type_id = jwet.id

                        union all

                        select
                            jj.id, jwr.id as jewellery_id,
                            jsonb_build_object(
                                    'types', details.details,
                                    'metrics', metrics.metrics,
                                    'finger', rf.name,
                                    'finger_id', rf.id
                            ) as spec_props,
                            metrics.quantity as quantity,
                            metrics.avg_price,
                            metrics.max_price,
                            metrics.min_price
                        from
                            jw_properties.rings as jwr
                                join (
                                select
                                    r.id,
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'ring_type_id', rd.ring_type_id,
                                            'ring_type', rt.name,
                                            'description', rt.description
                                        )
                                    ) as details
                                from jw_properties.rings as r
                                         join jw_properties.ring_details rd on r.id = rd.ring_id
                                         join jw_properties.ring_types rt on rd.ring_type_id = rt.id
                                group by r.id
                            ) as details on jwr.id = details.id
                                join (
                                select
                                    r.id,
                                    sum(rm.quantity) as quantity,
                                    cast(avg(rm.price) as decimal(10, 2)) as avg_price,
                                    cast(max(rm.price) as decimal(10, 2)) as max_price,
                                    cast(min(rm.price) as decimal(10, 2)) as min_price,
                                    jsonb_agg(
                                        jsonb_build_object(
                                            'ring_size_id', rs.id,
                                            'quantity', rm.quantity,
                                            'price', rm.price,
                                            'size', rs.value,
                                            'unit', rs.unit
                                        )
                                    ) as metrics
                                from jw_properties.rings as r
                                         join jw_properties.ring_metrics rm on r.id = rm.ring_id
                                         join jw_properties.ring_sizes rs on rm.ring_size_id = rs.id
                                group by r.id
                            ) as metrics on jwr.id = metrics.id
                        join jw_properties.ring_fingers rf on rf.id = jwr.ring_finger_id
                        join jewelleries.jewelleries jj on jwr.id = jj.id

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
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id
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
                                join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id
                                join jw_properties.bead_bases as jwbb on jwbd.bead_base_id = jwbb.id
                                join jw_properties.clasps as jwcls on jwbd.clasp_id = jwcls.id
                                left join jw_properties.bead_metrics as jwbdm on jwbd.id = jwbdm.bead_id
                                left join jw_properties.neck_sizes as jwns on jwbdm.neck_size_id = jwns.id
                                join jw_properties.length_names as jwln on jwns.length_name_id = jwln.id
                        group by jj.id,jwbd.id,jwcls.id,jwbb.id
                    )
                select
                    jj.id,
                    jj.jewellery_category_id,
                    jc.name as category,
                    jj.name,
                    jj.slug,
                    jj.description,
                    jj.part_number,
                    jj.approx_weight,
                    jj.is_active,
                    jj.created_at,
                    jj.updated_at,
                    vi.inserts,
                    vi.stone_id as dominant_stone_id,
                    vi.stone_name as dominant_stone,
                    vi.stone_colour_id as dominant_colour_id,
                    vi.colour_name as dominant_colour,
                    vi.facet_id as dominant_facet_id,
                    vi.facet_name as dominant_facet,
                    mtl.metals as precious_metals,
                    case
                        when cjp.spec_props isnull then
                            jsonb_build_object()
                        else
                            cjp.spec_props
                        end
                        as spec_props,
                    case
                        when cvrg.coverages isnull
                            then jsonb_build_array()
                        else
                            cvrg.coverages
                        end
                        as coverings,
                    cr.media_review,
                    cc.media_catalog,
                    cjp.quantity,
                    cjp.avg_price,
                    cjp.max_price,
                    cjp.min_price
                from
                    jewelleries.jewelleries as jj
                        left join jw_views.v_inserts vi on jj.id = vi.jewellery_id
                        join jewelleries.jewellery_categories as jc on jj.jewellery_category_id = jc.id
                        left join cte_jw_coverages as cvrg on jj.id = cvrg.jewellery_id
                        left join cte_jw_metals as mtl on jj.id = mtl.jewellery_id
                        left join cte_review as cr on jj.id = cr.jewellery_id
                        left join cte_catalog as cc on jj.id = cc.jewellery_id
                        left join cte_jw_props as cjp on  jj.id = cjp.jewellery_id

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
