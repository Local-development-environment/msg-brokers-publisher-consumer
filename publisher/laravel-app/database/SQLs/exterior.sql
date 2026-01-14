with
    cte_stones as (
        select
            gs.id as stone_id,
            gs.stone_family_id as family_id,
            sf.name as family,
            null as group_name,
            null as grade
        from
            jw_inserts.grown_stones as gs
                join jw_inserts.stone_families sf on gs.stone_family_id = sf.id

        union all

        select
            ns.id as stone_id,
            ns.stone_family_id as family_id,
            sf.name as family,
            sg.name as group_name,
            g.name as grade
        from
            jw_inserts.natural_stones as ns
                join jw_inserts.group_grades gg on ns.id = gg.id
                join jw_inserts.stone_families sf on ns.stone_family_id = sf.id
                join jw_inserts.stone_groups sg on gg.stone_group_id = sg.id
                left join jw_inserts.stone_item_grades sig on gg.id = sig.id
                left join jw_inserts.stone_grades g on sig.stone_grade_id = g.id

        union all

        select
            ist.id as stone_id,
            null as family_id,
            null as family,
            null as group_name,
            null as grade
        from
            jw_inserts.imitation_stones ist
    )
select
    se.id,
    concat_ws(' ',s.name,c.name,f.name) as exterior,
    s.name as stone,
    c.name as colour,
    f.name as facet,
    cs.*,
    t.id as type_origin_id,
    t.name as type_origin,
    oe.name as optical_effect
from
    cte_stones as cs
        join jw_inserts.stones as s on cs.stone_id = s.id
        join jw_inserts.type_origins t on s.type_origin_id = t.id
        left join jw_inserts.stone_optical_effects soe on s.id = soe.id
        left join jw_inserts.optical_effects oe on soe.optical_effect_id = oe.id
        join jw_inserts.stone_exteriors se on s.id = se.stone_id
        join jw_inserts.stone_colours c on se.stone_colour_id = c.id
        join jw_inserts.facets f on se.facet_id = f.id
;
