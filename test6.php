Можете посмотреть скрины, если я правильно понял задание, то работает он верно

/screens/test6/

SELECT DISTINCT department_id from evaluations
WHERE gender = 1
AND department_id NOT IN (
  SELECT department_id FROM evaluations
  WHERE gender = 1 AND value <= 5
);