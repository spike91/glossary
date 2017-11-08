CREATE DATABASE IF NOT EXISTS moviesdb_java DEFAULT CHARACTER SET utf8;
USE moviesdb_java;


CREATE TABLE `actor` (
  `actor_id` smallint(5) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `actor` (`actor_id`, `firstname`, `lastname`) VALUES
(1, 'Liv', 'Tyler'),
(2, 'Elijah', 'Wood'),
(3, 'Ian', 'McKellen'),
(4, 'Bruce ', 'Willis'),
(5, 'Aleksandr', 'Goloborodko'),
(6, 'Ingrīda ', 'Andriņa'),
(7, 'Пётр', 'Фёдоров'),
(8, 'Анна', 'Михалкова'),
(9, 'Ben', 'Affleck ');

CREATE TABLE `category` (
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Action'),
(2, 'Animation'),
(3, 'Children'),
(4, 'Classics'),
(5, 'Comedy'),
(6, 'Documentary'),
(7, 'Drama'),
(8, 'Family'),
(9, 'Horror'),
(10, 'Music');

CREATE TABLE `film` (
  `film_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `release_year` year(4) DEFAULT NULL,
  `language_id` smallint(5) UNSIGNED NOT NULL,
  `length` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `film` (`film_id`, `title`, `description`, `release_year`, `language_id`, `length`) VALUES
(1, 'The Lord of the Rings: The Return of the King', 'The Lord of the Rings film trilogy is unusual in that it was, up until the release of Jackson''s prequel trilogy The Hobbit, the only series whose separate instalments were written and shot simultaneously (excluding pick up shoots). Jackson found The Return of the King the easiest of the films to make, because it contained the climax of the story, unlike the other two films. The Return of the King was originally the second of two planned films under Miramax from January 1997 to August 1998, and more or less in its finished structure as the first film was to end with The Two Towers'' Battle of Helm''s Deep. Filming took place under multiple units across New Zealand, between 11 October 1999 and 22 December 2000, with pick up shoots for six weeks in 2003 before the film''s release.', 2003, 1, 200),
(2, 'Armageddon', 'Armageddon is a 1998 American science fiction disaster thriller film directed by Michael Bay, produced by Jerry Bruckheimer, and released by Touchstone Pictures. The film follows a group of blue-collar deep-core drillers sent by NASA to stop a gigantic asteroid on a collision course with Earth. It features an ensemble cast including Bruce Willis, Ben Affleck, Billy Bob Thornton, Liv Tyler, Owen Wilson, Will Patton, Peter Stormare, William Fichtner, Michael Clarke Duncan, Keith David, and Steve Buscemi.', 1998, 1, 150),
(3, 'The Fifth Element', 'The Fifth Element (French: Le Cinquième Élément) is a 1997 English-language French science fiction action film directed and co-written by Luc Besson. It stars Bruce Willis, Gary Oldman and Milla Jovovich. Primarily set in the 23rd century, the film''s central plot involves the survival of planet Earth, which becomes the responsibility of Korben Dallas (Willis), a taxicab driver and former special forces major, after a young woman (Jovovich) falls into his cab. Dallas joins forces with her to recover four mystical stones essential for the defence of Earth against an impending attack.', 1997, 1, 126),
(4, 'Viimne reliikvia', '"Viimne reliikvia" on Eesti film aastast 1969. Filmi süžee põhineb Eduard Bornhöhe romaanil "Vürst Gabriel ehk Pirita kloostri viimsed päevad". Eesti filmi sajanda juubeli puhul 2012. aastal valiti "Viimne reliikvia" parimaks nii filmikildude kui ka filmilaulude poolest', 1969, 2, 86),
(5, 'Ледокол', '«Ледокол» — российский фильм-катастрофа режиссёра Николая Хомерики. Производство студии «ПРОФИТ». Премьера фильма в России состоялась 20 октября 2016 года. Сюжет фильма основан на реальных событиях, произошедших в 1985 году с ледоколом «Михаил Сомов», который оказался зажат антарктическими льдами и провёл в вынужденном дрейфе 133 дня.', 2016, 3, 129);

CREATE TABLE `actor_film` (
  `actor_id` smallint(5) UNSIGNED NOT NULL,
  `cast` varchar(30) NOT NULL,
  `film_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `actor_film` (`actor_id`, `cast`, `film_id`) VALUES
(1, 'Arwen', 1),
(1, 'Grace Stamper', 2),
(2, 'Frodo Baggins', 1),
(3, 'Gandalf the White', 1),
(4, 'Harry Stamper', 2),
(4, '', 3),
(5, '', 4),
(6, '', 4),
(7, '', 5),
(8, '', 5),
(9, 'A.J. Frost', 2);

CREATE TABLE `category_film` (
  `film_id` smallint(5) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category_film` (`film_id`, `category_id`) VALUES
(1, 1),
(1, 7),
(2, 1),
(3, 1),
(4, 1),
(5, 7);


CREATE TABLE `language` (
  `language_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`language_id`, `name`) VALUES
(1, 'English'),
(2, 'Estonian'),
(3, 'Russian');


ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`),
  ADD KEY `idx_actor_lastname` (`lastname`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `idx_title` (`title`),
  ADD KEY `fk_film_language` (`language_id`);

ALTER TABLE `actor_film`
  ADD PRIMARY KEY (`actor_id`,`film_id`),
  ADD KEY `fk_film_actor_film` (`film_id`);

ALTER TABLE `category_film`
  ADD PRIMARY KEY (`film_id`,`category_id`),
  ADD KEY `fk_film_category_category` (`category_id`);

ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);


ALTER TABLE `actor`
  MODIFY `actor_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `category`
  MODIFY `category_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `film`
  MODIFY `film_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `language`
  MODIFY `language_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_language` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE;

ALTER TABLE `actor_film`
  ADD CONSTRAINT `fk_film_actor_actor` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_film_actor_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON UPDATE CASCADE;

ALTER TABLE `category_film`
  ADD CONSTRAINT `fk_film_category_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_film_category_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON UPDATE CASCADE;

