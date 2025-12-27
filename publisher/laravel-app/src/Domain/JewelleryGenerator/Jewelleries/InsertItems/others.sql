-- dominant insert cte for inserts view
select
    i.jewellery_id,
    i.weight,
    se.stone_id,
    se.colour_id,
    se.facet_id,
    s.name as stone_name,
    c.name as colour_name,
    f.name as facet_name
from
    jw_inserts.inserts as i
join jw_inserts.stone_exteriors se on i.stone_exterior_id = se.id
join jw_inserts.stones s on se.stone_id = s.id
join jw_inserts.colours c on se.colour_id = c.id
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
    cte_media_catalog as (
        select
            jp.id,
            jp.alt_name,
            jp.is_active,
            jsonb_agg(
                jsonb_build_object(
                    'src', jp.src,
                    'ext', jp.extension
                )
            ) as metadata
        from
            jw_medias.jewellery_pictures jp
        group by jp.id

        union all

        select
            jv.id,
            jv.alt_name,
            jv.is_active,
            jsonb_agg(
                jsonb_build_object(
                    'src', jvd.src,
                    'ext', vt.extension,
                    'type', vt.type
                )
            ) as metadata
        from
            jw_medias.jewellery_videos jv
                join jw_medias.jewellery_video_details jvd on jv.id = jvd.jewellery_video_id
                join jw_medias.video_types vt on vt.id = jvd.video_type_id
        group by jv.id
    ),
    cte_catalog as (
        select
            mc.jewellery_id,
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
                join jw_medias.media_catalogs mc on cmc.id = mc.id
                join jw_medias.media_types mt on mc.media_type_id = mt.id
        group by mc.jewellery_id
    )
select
    *
from
    cte_catalog as cc
;

-- media review
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
            mr.jewellery_id,
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
                join jw_medias.media_reviews mr on cmr.id = mr.id
                join jw_medias.media_types mt on mr.media_type_id = mt.id
        group by mr.jewellery_id
    )
select
    *
from
    cte_review as cr
;