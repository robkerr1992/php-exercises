USE codeup_test_db;

SELECT name as 'Pink Floyd Albums' from albums where artist = 'Pink Floyd';
SELECT release_date as 'Year' from albums where name = 'Sgt. Pepper''s Lonely Hearts Club Band';
SELECT genre as 'Genre' from albums where name = 'Nevermind';
SELECT name as 'Albums Before 1990' from albums where release_date < 19900000;
SELECT name as 'Albums under 20 million sales' from albums where sales < 2000000;
SELECT name as 'Rock Albums' from albums where genre = 'Rock';

