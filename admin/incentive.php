INSERT INTO incentive_events (name, text, place, date, time, created) VALUES (?,?,?,?,?,NOW());

UPDATE incentive_events SET name = ?, text = ?,
 place = ?, date = ?, time = ?, created = NOW() WHERE id = ?;



 


