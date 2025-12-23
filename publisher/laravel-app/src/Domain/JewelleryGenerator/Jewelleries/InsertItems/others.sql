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