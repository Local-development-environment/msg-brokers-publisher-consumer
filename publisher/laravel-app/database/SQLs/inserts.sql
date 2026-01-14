with
    cte_dominant as (
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
    ),
    cte_stones as (
        select
            gs.id as stone_id,
            gs.stone_family_id as family_id,
            sf.name as family,
            sf.description as family_description,
            null as group_id,
            null as group_name,
            null as group_description,
            null as grade_id,
            null as grade_name,
            null as grade_description
        from
            jw_inserts.grown_stones as gs
                join jw_inserts.stone_families sf on gs.stone_family_id = sf.id

        union all

        select
            ns.id as stone_id,
            ns.stone_family_id as family_id,
            sf.name as family,
            sf.description as family_description,
            sg.id as group_id,
            sg.name as group_name,
            sg.description as group_description,
            g.id as grade_id,
            g.name as grade_name,
            g.description as grade_description
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
            null as family_description,
            null as group_id,
            null as group_name,
            null as group_description,
            null as grade_id,
            null as grade_name,
            null as grade_description
        from
            jw_inserts.imitation_stones ist
    )
select
    jsonb_agg(
        jsonb_build_object(
            'stone_exterior_id', se.id,
            'jewellery_id', i.jewellery_id,
            'quantity', i.quantity,
            'weight', i.weight,
            'dimensions', i.dimensions,
            'exterior', concat_ws(' ',s.name,c.name,f.name),
            'stone_id', s.id,
            'stone_name', s.name,
            'stone_description', s.description,
            'colour_id', c.id,
            'colour_name', c.name,
            'colour_description', c.description,
            'facet_id', f.id,
            'facet_name', f.name,
            'facet_description', f.description,
            'family_id', cs.family_id,
            'family', cs.family,
            'family_description', cs.family_description,
            'group_id', cs.group_id,
            'group_name', cs.group_name,
            'group_description', cs.group_description,
            'grade_id', cs.grade_id,
            'grade_name', cs.grade_name,
            'grade_description', cs.grade_description,
            'type_stone_id', t.id,
            'type_stone_name', t.name,
            'type_stone_description', t.description,
            'optical_effect_id', oe.id,
            'optical_effect_name', oe.name,
            'optical_effect_description', oe.description,
            'expr_opt_effect',
            case
                when oe.id isnull then
                    'без оптического эффекта'
                else
                    concat_ws(' ', 'с оптическим эффектом', oe.name)
                end,
            'total_weight', i.quantity * i.weight
        )
    ) as inserts,
    cast(max(i.weight) as decimal(8,3)) as dominant_weight,
    ctd.stone_id,
    ctd.stone_name,
    ctd.stone_colour_id,
    ctd.colour_name,
    ctd.facet_id,
    ctd.facet_name
from
    cte_stones as cs
        join jw_inserts.stones as s on cs.stone_id = s.id
        join jw_inserts.type_origins t on s.type_origin_id = t.id
        left join jw_inserts.stone_optical_effects soe on s.id = soe.id
        left join jw_inserts.optical_effects oe on soe.optical_effect_id = oe.id
        join jw_inserts.stone_exteriors se on s.id = se.stone_id
        join jw_inserts.stone_colours c on se.stone_colour_id = c.id
        join jw_inserts.facets f on se.facet_id = f.id
        join jw_inserts.inserts i on se.id = i.stone_exterior_id
        join cte_dominant ctd on i.jewellery_id = ctd.jewellery_id
group by i.jewellery_id, ctd.stone_id, ctd.stone_name, ctd.stone_colour_id, ctd.colour_name, ctd.facet_id, ctd.facet_name
;
