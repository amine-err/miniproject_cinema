-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2023 at 02:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebCinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `idAccount` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(5) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`idAccount`, `username`, `password`, `type`, `createdDate`, `lastModifiedDate`) VALUES
(5, 'amine', '3b5fdc9bff614cdec3905a18f0570192', 'admin', '2023-01-12 04:55:04', '2023-01-12 04:55:04'),
(6, 'hiba', '07e480afd0510ddff4236ea3ca870069', 'user', '2023-01-12 13:18:45', '2023-01-12 13:18:45'),
(8, 'ahmed', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2023-01-14 01:35:20', '2023-01-14 01:35:20'),
(10, 'inema', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2023-01-14 08:53:19', '2023-01-14 08:53:19'),
(11, 'ghalla', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '2023-01-14 09:47:59', '2023-01-14 09:47:59'),
(12, 'test', 'cc03e747a6afbbcbf8be7668acfebee5', 'user', '2023-01-14 11:17:38', '2023-01-14 11:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `idFilm` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `duration` varchar(7) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `director` varchar(30) NOT NULL,
  `inProjection` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`idFilm`, `title`, `poster`, `year`, `duration`, `genre`, `rating`, `description`, `director`, `inProjection`, `price`, `createdDate`, `lastModifiedDate`) VALUES
(3, 'The Dark Knight', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_UX67_CR0,0,67,98_AL_.jpg', 2008, '152 min', 'Action, Crime, Drama', 4.5, 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'Christopher Nolan', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(4, 'The Godfather: Part II', 'https://m.media-amazon.com/images/M/MV5BMWMwMGQzZTItY2JlNC00OWZiLWIyMDctNDk2ZDQ2YjRjMWQ0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY98_CR1,0,67,98_AL_.jpg', 1974, '202 min', 'Crime, Drama', 4.5, 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.', 'Francis Ford Coppola', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(5, '12 Angry Men', 'https://m.media-amazon.com/images/M/MV5BMWU4N2FjNzYtNTVkNC00NzQ0LTg0MjAtYTJlMjFhNGUxZDFmXkEyXkFqcGdeQXVyNjc1NTYyMjg@._V1_UX67_CR0,0,67,98_AL_.jpg', 1957, '96 min', 'Crime, Drama', 4.5, 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.', 'Sidney Lumet', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(6, 'The Lord of the Rings: The Return of the King', 'https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 2003, '201 min', 'Action, Adventure, Drama', 4.45, 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'Peter Jackson', 0, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(7, 'Pulp Fiction', 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY98_CR0,0,67,98_AL_.jpg', 1994, '154 min', 'Crime, Drama', 4.45, 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Quentin Tarantino', 0, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(8, 'Schindler\'s List', 'https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1993, '195 min', 'Biography, Drama, History', 4.45, 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'Steven Spielberg', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(9, 'Inception', 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_UX67_CR0,0,67,98_AL_.jpg', 2010, '148 min', 'Action, Adventure, Sci-Fi', 4.4, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'Christopher Nolan', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(10, 'Fight Club', 'https://m.media-amazon.com/images/M/MV5BMmEzNTkxYjQtZTc0MC00YTVjLTg5ZTEtZWMwOWVlYzY0NWIwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1999, '139 min', 'Drama', 4.4, 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', 'David Fincher', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(11, 'The Lord of the Rings: The Fellowship of the Ring', 'https://m.media-amazon.com/images/M/MV5BN2EyZjM3NzUtNWUzMi00MTgxLWI0NTctMzY4M2VlOTdjZWRiXkEyXkFqcGdeQXVyNDUzOTQ5MjY@._V1_UX67_CR0,0,67,98_AL_.jpg', 2001, '178 min', 'Action, Adventure, Drama', 4.4, 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.', 'Peter Jackson', 0, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(12, 'Forrest Gump', 'https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UY98_CR0,0,67,98_AL_.jpg', 1994, '142 min', 'Drama, Romance', 4.4, 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 'Robert Zemeckis', 1, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(13, 'Il buono, il brutto, il cattivo', 'https://m.media-amazon.com/images/M/MV5BOTQ5NDI3MTI4MF5BMl5BanBnXkFtZTgwNDQ4ODE5MDE@._V1_UX67_CR0,0,67,98_AL_.jpg', 1966, '161 min', 'Western', 4.4, 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'Sergio Leone', 0, 50, '2023-01-11 21:33:52', '2023-01-11 21:33:52'),
(14, 'The Lord of the Rings: The Two Towers', 'https://m.media-amazon.com/images/M/MV5BZGMxZTdjZmYtMmE2Ni00ZTdkLWI5NTgtNjlmMjBiNzU2MmI5XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 2002, '179 min', 'Action, Adventure, Drama', 4.35, 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.', 'Peter Jackson', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(15, 'The Matrix', 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1999, '136 min', 'Action, Sci-Fi', 4.35, 'When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.', 'Lana Wachowski', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(16, 'Goodfellas', 'https://m.media-amazon.com/images/M/MV5BY2NkZjEzMDgtN2RjYy00YzM1LWI4ZmQtMjIwYjFjNmI3ZGEwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1990, '146 min', 'Biography, Crime, Drama', 4.35, 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.', 'Martin Scorsese', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(17, 'Star Wars: Episode V - The Empire Strikes Back', 'https://m.media-amazon.com/images/M/MV5BYmU1NDRjNDgtMzhiMi00NjZmLTg5NGItZDNiZjU5NTU4OTE0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1980, '124 min', 'Action, Adventure, Fantasy', 4.35, 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued by Darth Vader and a bounty hunter named Boba Fett all over the galaxy.', 'Irvin Kershner', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(18, 'One Flew Over the Cuckoo\'s Nest', 'https://m.media-amazon.com/images/M/MV5BZjA0OWVhOTAtYWQxNi00YzNhLWI4ZjYtNjFjZTEyYjJlNDVlL2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UX67_CR0,0,67,98_AL_.jpg', 1975, '133 min', 'Drama', 4.35, 'A criminal pleads insanity and is admitted to a mental institution, where he rebels against the oppressive nurse and rallies up the scared patients.', 'Milos Forman', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(19, 'Hamilton', 'https://m.media-amazon.com/images/M/MV5BNjViNWRjYWEtZTI0NC00N2E3LTk0NGQtMjY4NTM3OGNkZjY0XkEyXkFqcGdeQXVyMjUxMTY3ODM@._V1_UX67_CR0,0,67,98_AL_.jpg', 2020, '160 min', 'Biography, Drama, History', 4.3, 'The real life of one of America\'s foremost founding fathers and first Secretary of the Treasury, Alexander Hamilton. Captured live on Broadway from the Richard Rodgers Theater with the original Broadway cast.', 'Thomas Kail', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(20, 'Gisaengchung', 'https://m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 2019, '132 min', 'Comedy, Drama, Thriller', 4.3, 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', 'Bong Joon Ho', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(21, 'Soorarai Pottru', 'https://m.media-amazon.com/images/M/MV5BOTc2ZTlmYmItMDBhYS00YmMzLWI4ZjAtMTI5YTBjOTFiMGEwXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_UY98_CR0,0,67,98_AL_.jpg', 2020, '153 min', 'Drama', 4.3, 'Nedumaaran Rajangam \"Maara\" sets out to make the common man fly and in the process takes on the world\'s most capital intensive industry and several enemies who stand in his way.', 'Sudha Kongara', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(22, 'Interstellar', 'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX67_CR0,0,67,98_AL_.jpg', 2014, '169 min', 'Adventure, Drama, Sci-Fi', 4.3, 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'Christopher Nolan', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(23, 'Cidade de Deus', 'https://m.media-amazon.com/images/M/MV5BOTMwYjc5ZmItYTFjZC00ZGQ3LTlkNTMtMjZiNTZlMWQzNzI5XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 2002, '130 min', 'Crime, Drama', 4.3, 'In the slums of Rio, two kids\' paths diverge as one struggles to become a photographer and the other a kingpin.', 'Fernando Meirelles', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(24, 'Sen to Chihiro no kamikakushi', 'https://m.media-amazon.com/images/M/MV5BMjlmZmI5MDctNDE2YS00YWE0LWE5ZWItZDBhYWQ0NTcxNWRhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX67_CR0,0,67,98_AL_.jpg', 2001, '125 min', 'Animation, Adventure, Family', 4.3, 'During her family\'s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.', 'Hayao Miyazaki', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(25, 'Saving Private Ryan', 'https://m.media-amazon.com/images/M/MV5BZjhkMDM4MWItZTVjOC00ZDRhLThmYTAtM2I5NzBmNmNlMzI1XkEyXkFqcGdeQXVyNDYyMDk5MTU@._V1_UX67_CR0,0,67,98_AL_.jpg', 1998, '169 min', 'Drama, War', 4.3, 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.', 'Steven Spielberg', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(26, 'The Green Mile', 'https://m.media-amazon.com/images/M/MV5BMTUxMzQyNjA5MF5BMl5BanBnXkFtZTYwOTU2NTY3._V1_UX67_CR0,0,67,98_AL_.jpg', 1999, '189 min', 'Crime, Drama, Fantasy', 4.3, 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.', 'Frank Darabont', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(27, 'La vita ?? bella', 'https://m.media-amazon.com/images/M/MV5BYmJmM2Q4NmMtYThmNC00ZjRlLWEyZmItZTIwOTBlZDQ3NTQ1XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UX67_CR0,0,67,98_AL_.jpg', 1997, '116 min', 'Comedy, Drama, Romance', 4.3, 'When an open-minded Jewish librarian and his son become victims of the Holocaust, he uses a perfect mixture of will, humor, and imagination to protect his son from the dangers around their camp.', 'Roberto Benigni', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(28, 'Se7en', 'https://m.media-amazon.com/images/M/MV5BOTUwODM5MTctZjczMi00OTk4LTg3NWUtNmVhMTAzNTNjYjcyXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1995, '127 min', 'Crime, Drama, Mystery', 4.3, 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', 'David Fincher', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(29, 'The Silence of the Lambs', 'https://m.media-amazon.com/images/M/MV5BNjNhZTk0ZmEtNjJhMi00YzFlLWE1MmEtYzM1M2ZmMGMwMTU4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1991, '118 min', 'Crime, Drama, Thriller', 4.3, 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 'Jonathan Demme', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(30, 'Star Wars', 'https://m.media-amazon.com/images/M/MV5BNzVlY2MwMjktM2E4OS00Y2Y3LWE3ZjctYzhkZGM3YzA1ZWM2XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1977, '121 min', 'Action, Adventure, Fantasy', 4.3, 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire\'s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.', 'George Lucas', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(31, 'Seppuku', 'https://m.media-amazon.com/images/M/MV5BYjBmYTQ1NjItZWU5MS00YjI0LTg2OTYtYmFkN2JkMmNiNWVkXkEyXkFqcGdeQXVyMTMxMTY0OTQ@._V1_UY98_CR2,0,67,98_AL_.jpg', 1962, '133 min', 'Action, Drama, Mystery', 4.3, 'When a ronin requesting seppuku at a feudal lord\'s palace is told of the brutal suicide of another ronin who previously visited, he reveals how their pasts are intertwined - and in doing so challenges the clan\'s integrity.', 'Masaki Kobayashi', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(32, 'Shichinin no samurai', 'https://m.media-amazon.com/images/M/MV5BOWE4ZDdhNmMtNzE5ZC00NzExLTlhNGMtY2ZhYjYzODEzODA1XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_UY98_CR1,0,67,98_AL_.jpg', 1954, '207 min', 'Action, Adventure, Drama', 4.3, 'A poor village under attack by bandits recruits seven unemployed samurai to help them defend themselves.', 'Akira Kurosawa', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(33, 'It\'s a Wonderful Life', 'https://m.media-amazon.com/images/M/MV5BZjc4NDZhZWMtNGEzYS00ZWU2LThlM2ItNTA0YzQ0OTExMTE2XkEyXkFqcGdeQXVyNjUwMzI2NzU@._V1_UY98_CR0,0,67,98_AL_.jpg', 1946, '130 min', 'Drama, Family, Fantasy', 4.3, 'An angel is sent from Heaven to help a desperately frustrated businessman by showing him what life would have been like if he had never existed.', 'Frank Capra', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(34, 'Joker', 'https://m.media-amazon.com/images/M/MV5BNGVjNWI4ZGUtNzE0MS00YTJmLWE0ZDctN2ZiYTk2YmI3NTYyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX67_CR0,0,67,98_AL_.jpg', 2019, '122 min', 'Crime, Drama, Thriller', 4.25, 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.', 'Todd Phillips', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(35, 'Whiplash', 'https://m.media-amazon.com/images/M/MV5BOTA5NDZlZGUtMjAxOS00YTRkLTkwYmMtYWQ0NWEwZDZiNjEzXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX67_CR0,0,67,98_AL_.jpg', 2014, '106 min', 'Drama, Music', 4.25, 'A promising young drummer enrolls at a cut-throat music conservatory where his dreams of greatness are mentored by an instructor who will stop at nothing to realize a student\'s potential.', 'Damien Chazelle', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(36, 'The Intouchables', 'https://m.media-amazon.com/images/M/MV5BMTYxNDA3MDQwNl5BMl5BanBnXkFtZTcwNTU4Mzc1Nw@@._V1_UX67_CR0,0,67,98_AL_.jpg', 2011, '112 min', 'Biography, Comedy, Drama', 4.25, 'After he becomes a quadriplegic from a paragliding accident, an aristocrat hires a young man from the projects to be his caregiver.', 'Olivier Nakache', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(37, 'The Prestige', 'https://m.media-amazon.com/images/M/MV5BMjA4NDI0MTIxNF5BMl5BanBnXkFtZTYwNTM0MzY2._V1_UX67_CR0,0,67,98_AL_.jpg', 2006, '130 min', 'Drama, Mystery, Sci-Fi', 4.25, 'After a tragic accident, two stage magicians engage in a battle to create the ultimate illusion while sacrificing everything they have to outwit each other.', 'Christopher Nolan', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(38, 'The Departed', 'https://m.media-amazon.com/images/M/MV5BMTI1MTY2OTIxNV5BMl5BanBnXkFtZTYwNjQ4NjY3._V1_UX67_CR0,0,67,98_AL_.jpg', 2006, '151 min', 'Crime, Drama, Thriller', 4.25, 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 'Martin Scorsese', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(39, 'The Pianist', 'https://m.media-amazon.com/images/M/MV5BOWRiZDIxZjktMTA1NC00MDQ2LWEzMjUtMTliZmY3NjQ3ODJiXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UY98_CR2,0,67,98_AL_.jpg', 2002, '150 min', 'Biography, Drama, Music', 4.25, 'A Polish Jewish musician struggles to survive the destruction of the Warsaw ghetto of World War II.', 'Roman Polanski', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(40, 'Gladiator', 'https://m.media-amazon.com/images/M/MV5BMDliMmNhNDEtODUyOS00MjNlLTgxODEtN2U3NzIxMGVkZTA1L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 2000, '155 min', 'Action, Adventure, Drama', 4.25, 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', 'Ridley Scott', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(41, 'American History X', 'https://m.media-amazon.com/images/M/MV5BZjA0MTM4MTQtNzY5MC00NzY3LWI1ZTgtYzcxMjkyMzU4MDZiXkEyXkFqcGdeQXVyNDYyMDk5MTU@._V1_UX67_CR0,0,67,98_AL_.jpg', 1998, '119 min', 'Drama', 4.25, 'A former neo-nazi skinhead tries to prevent his younger brother from going down the same wrong path that he did.', 'Tony Kaye', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(42, 'The Usual Suspects', 'https://m.media-amazon.com/images/M/MV5BYTViNjMyNmUtNDFkNC00ZDRlLThmMDUtZDU2YWE4NGI2ZjVmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1995, '106 min', 'Crime, Mystery, Thriller', 4.25, 'A sole survivor tells of the twisty events leading up to a horrific gun battle on a boat, which began when five criminals met at a seemingly random police lineup.', 'Bryan Singer', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(43, 'L??on', 'https://m.media-amazon.com/images/M/MV5BODllNWE0MmEtYjUwZi00ZjY3LThmNmQtZjZlMjI2YTZjYmQ0XkEyXkFqcGdeQXVyNTc1NTQxODI@._V1_UX67_CR0,0,67,98_AL_.jpg', 1994, '110 min', 'Action, Crime, Drama', 4.25, 'Mathilda, a 12-year-old girl, is reluctantly taken in by L??on, a professional assassin, after her family is murdered. An unusual relationship forms as she becomes his prot??g??e and learns the assassin\'s trade.', 'Luc Besson', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(44, 'The Lion King', 'https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2JiM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_UX67_CR0,0,67,98_AL_.jpg', 1994, '88 min', 'Animation, Adventure, Drama', 4.25, 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.', 'Roger Allers', 1, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(45, 'Terminator 2: Judgment Day', 'https://m.media-amazon.com/images/M/MV5BMGU2NzRmZjUtOGUxYS00ZjdjLWEwZWItY2NlM2JhNjkxNTFmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1991, '137 min', 'Action, Sci-Fi', 4.25, 'A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her teenage son, John Connor, from a more advanced and powerful cyborg.', 'James Cameron', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(46, 'Nuovo Cinema Paradiso', 'https://m.media-amazon.com/images/M/MV5BM2FhYjEyYmYtMDI1Yy00YTdlLWI2NWQtYmEzNzAxOGY1NjY2XkEyXkFqcGdeQXVyNTA3NTIyNDg@._V1_UX67_CR0,0,67,98_AL_.jpg', 1988, '155 min', 'Drama, Romance', 4.25, 'A filmmaker recalls his childhood when falling in love with the pictures at the cinema of his home village and forms a deep friendship with the cinema\'s projectionist.', 'Giuseppe Tornatore', 0, 50, '2023-01-11 21:33:53', '2023-01-11 21:33:53'),
(47, 'Hotaru no haka', 'https://m.media-amazon.com/images/M/MV5BZmY2NjUzNDQtNTgxNC00M2Q4LTljOWQtMjNjNDBjNWUxNmJlXkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_UX67_CR0,0,67,98_AL_.jpg', 1988, '89 min', 'Animation, Drama, War', 4.25, 'A young boy and his little sister struggle to survive in Japan during World War II.', 'Isao Takahata', 0, 50, '2023-01-11 21:33:54', '2023-01-11 21:33:54'),
(48, 'Back to the Future', 'https://m.media-amazon.com/images/M/MV5BZmU0M2Y1OGUtZjIxNi00ZjBkLTg1MjgtOWIyNThiZWIwYjRiXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UX67_CR0,0,67,98_AL_.jpg', 1985, '116 min', 'Adventure, Comedy, Sci-Fi', 4.25, 'Marty McFly, a 17-year-old high school student, is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his close friend, the eccentric scientist Doc Brown.', 'Robert Zemeckis', 0, 50, '2023-01-11 21:33:54', '2023-01-11 21:33:54'),
(49, 'Once Upon a Time in the West', 'https://m.media-amazon.com/images/M/MV5BZGI5MjBmYzYtMzJhZi00NGI1LTk3MzItYjBjMzcxM2U3MDdiXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1968, '165 min', 'Western', 4.25, 'A mysterious stranger with a harmonica joins forces with a notorious desperado to protect a beautiful widow from a ruthless assassin working for the railroad.', 'Sergio Leone', 0, 50, '2023-01-11 21:33:54', '2023-01-11 21:33:54'),
(50, 'Psycho', 'https://m.media-amazon.com/images/M/MV5BNTQwNDM1YzItNDAxZC00NWY2LTk0M2UtNDIwNWI5OGUyNWUxXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UX67_CR0,0,67,98_AL_.jpg', 1960, '109 min', 'Horror, Mystery, Thriller', 4.25, 'A Phoenix secretary embezzles $40,000 from her employer\'s client, goes on the run, and checks into a remote motel run by a young man under the domination of his mother.', 'Alfred Hitchcock', 0, 50, '2023-01-11 21:33:54', '2023-01-11 21:33:54'),
(51, 'dqdqzdqz', 'modifier', 2000, '120', 'dqzd', 0, 'dqzdqzdzq', 'dqdqzdqz', 1, 200, '2023-01-14 09:09:57', '2023-01-14 09:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `idInfo` int(11) NOT NULL,
  `idAccount` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bankcard` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `idAccount` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `hour` varchar(5) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `idAccount`, `idFilm`, `hour`, `quantity`, `price`, `createdDate`, `lastModifiedDate`) VALUES
(1, 6, 10, '12:00', 2, 100, '2023-01-12 13:43:36', '2023-01-12 13:43:36'),
(2, 6, 5, '09:00', 3, 50, '2023-01-14 11:00:21', '2023-01-14 11:00:21'),
(3, 6, 4, '09:00', 1, 50, '2023-01-14 11:00:21', '2023-01-14 11:00:21'),
(4, 6, 5, '09:00', 2, 50, '2023-01-14 11:02:10', '2023-01-14 11:02:10'),
(5, 6, 3, '09:00', 3, 50, '2023-01-14 11:09:20', '2023-01-14 11:09:20'),
(6, 12, 4, '09:00', 2, 50, '2023-01-14 11:18:44', '2023-01-14 11:18:44'),
(7, 6, 3, '09:00', 2, 50, '2023-01-14 13:27:10', '2023-01-14 13:27:10'),
(8, 6, 17, '12:00', 3, 50, '2023-01-14 13:27:10', '2023-01-14 13:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `idProgram` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `date` date NOT NULL,
  `hours` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`idProgram`, `idFilm`, `date`, `hours`, `room`, `createdDate`, `lastModifiedDate`) VALUES
(1, 37, '2023-01-11', '12:00,09:00', 12, '2023-01-14 06:15:15', '2023-01-14 06:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `idRating` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `idAccount` int(11) NOT NULL,
  `score` float NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifiedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`idAccount`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idFilm`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`idInfo`),
  ADD KEY `info_idAccount` (`idAccount`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `order_idAccount` (`idAccount`),
  ADD KEY `order_idFilm` (`idFilm`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`idProgram`),
  ADD KEY `program_idFilm` (`idFilm`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idRating`),
  ADD KEY `rating_idFilm` (`idFilm`),
  ADD KEY `rating_idAccount` (`idAccount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `idAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `idInfo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `idProgram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `idRating` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `info_idAccount` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`idAccount`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_idAccount` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`idAccount`),
  ADD CONSTRAINT `order_idFilm` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `program_idFilm` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_idAccount` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`idAccount`),
  ADD CONSTRAINT `rating_idFilm` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
