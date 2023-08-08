
ALTER TABLE books DROP COLUMN release_date,
                  ADD COLUMN release_date YEAR NULL AFTER name;

ALTER TABLE books ADD COLUMN reserved tinyint default 0 AFTER description;

ALTER TABLE books ADD COLUMN user_id INT(10) UNSIGNED NULL AFTER reserved;

UPDATE books SET user_id=NULL WHERE user_id=0;


