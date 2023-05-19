Можете посмотреть скрины, если я правильно понял задание, то работает он верно

/screens/test5/

SELECT g.id, g.name
FROM goods g
WHERE NOT EXISTS (
  SELECT t.id
  FROM tags t
  WHERE NOT EXISTS (
    SELECT gt.tag_id
    FROM goods_tags gt
    WHERE gt.tag_id = t.id AND gt.goods_id = g.id
  )
);