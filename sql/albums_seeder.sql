USE codeup_test_db;
TRUNCATE albums;
INSERT INTO albums (artist, name, release_date, sales, genre)
VALUES ('Michael Jackson', 'Thriller', 19820000, 45400000, 'Pop'),
('Nirvana', 'Nevermind', 19910000, 16700000, 'Grunge'),
('Pink Floyd', 'Dark Side of the Moon', 19730000, 22700000, 'Progressive Rock'),
('The Beatles', 'Sgt. Pepper''s Lonely Heart Club Band', 19670000, 13100000, 'Rock');