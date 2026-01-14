-- dominant insert cte for inserts view
select
    i.jewellery_id,
    i.weight,
    se.stone_id,
    se.stone_colour_id,
    se.facet_id,
    s.name as stone_name,
    c.name as colour_name,
    f.name as facet_name
from
    jw_inserts.inserts as i
join jw_inserts.stone_exteriors se on i.stone_exterior_id = se.id
join jw_inserts.stones s on se.stone_id = s.id
join jw_inserts.stone_colours c on se.stone_colour_id = c.id
join jw_inserts.facets f on se.facet_id = f.id
join
    (
        select
            jewellery_id,
            max(ii.weight) as weight
        from jw_inserts.inserts as ii
        group by ii.jewellery_id
    ) as weights
    on i.jewellery_id = weights.jewellery_id
        and i.weight = weights.weight
;

SELECT *
FROM (
         VALUES
             (1, 'Widget A', 2),
             (1, 'Widget B', 1),
             (2, 'Widget C', 3),
             (2, 'Widget D', 2)
     ) AS t(order_id, product_name, quantity);

-- media catalog
with
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
    )
select
    cr.media_review,
    cc.media_catalog
from
    jewelleries.jewelleries as jj
        left join cte_review as cr on jj.id = cr.jewellery_id
        left join cte_catalog as cc on jj.id = cc.jewellery_id
;
