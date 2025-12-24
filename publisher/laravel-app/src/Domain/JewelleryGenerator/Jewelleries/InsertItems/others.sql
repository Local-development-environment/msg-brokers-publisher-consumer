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
-- cte video
select
    v.jewellery_id,
    jsonb_agg(
        jsonb_build_object(
            'src', vd.src,
            'type', vt.type,
            'ext', vt.extension
--             'producer', p.name
        )
    ) videos
from
    jewelleries.jewelleries as jj
        left join jw_medias.videos v on jj.id = v.jewellery_id
        left join jw_medias.video_details vd on v.id = vd.video_id
        left join jw_medias.video_types vt on vd.video_type_id = vt.id
--         left join jw_medias.producers p on v.producer_id = p.id
group by v.jewellery_id
;

with
    cte_videos as (
        select
            jsonb_agg(
                jsonb_build_object(
                    'src', vd.src,
                    'type', vt.type,
                    'ext', vt.extension
                )
            ) as video_src,
            v.jewellery_id,
            p.name as producer
        from
            jw_medias.video_details as vd
                join jw_medias.videos v on v.id = vd.video_id
                join jw_medias.video_types vt on vd.video_type_id = vt.id
                join jw_medias.videos on vd.video_id = videos.id
                left join jw_medias.producers p on v.producer_id = p.id
        group by vd.video_id, v.jewellery_id, p.name
    )
select
    jsonb_agg(
        jsonb_build_object(
            ctv.producer, ctv.video_src
        )
    )
from
    cte_videos ctv
        join jewelleries.jewelleries as jj on ctv.jewellery_id = jj.id
group by jj.id
