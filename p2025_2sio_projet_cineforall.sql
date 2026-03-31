
--

INSERT INTO `casting` (`film_id`, `pers_id`, `nomJoue`, `preJoue`, `principale`, `secondaire`) VALUES
(1, 1, '', '', 0, 0),
(1, 7, 'Wayne / Batman', 'Bruce', 1, 0),
(1, 8, 'Joker', 'The', 1, 0),
(1, 5, 'Pennyworth', 'Alfred', 0, 1),
(1, 40, 'Dent / Two-Face', 'Harvey', 0, 1),
(1, 41, 'Gordon', 'James', 0, 1),
(1, 42, 'Fox', 'Lucius', 0, 1),
(2, 1, '', '', 0, 0),
(2, 6, 'Oppenheimer', 'J. Robert', 1, 0),
(2, 12, 'Strauss', 'Lewis', 0, 1),
(2, 21, 'Groves Jr.', 'Leslie', 0, 1),
(2, 33, 'Tatlock', 'Jean', 0, 1),
(3, 36, '', '', 0, 0),
(3, 2, 'Dawson', 'Jack', 1, 0),
(3, 35, 'DeWitt Bukater', 'Rose', 1, 0),
(4, 22, '', '', 0, 0),
(4, 44, 'Vega', 'Vincent', 1, 0),
(4, 45, 'Winnfield', 'Jules', 1, 0),
(4, 23, 'Wallace', 'Mia', 1, 0),
(4, 46, 'Wolf', 'Winston', 0, 1),
(4, 24, 'Coolidge', 'Butch', 0, 1),
(5, 27, '', '', 0, 0),
(5, 28, 'Narrateur', 'Le', 1, 0),
(5, 24, 'Durden', 'Tyler', 1, 0),
(5, 9, 'Singer', 'Marla', 0, 1),
(6, 42, 'Redding', 'Ellis Boyd Red', 1, 0),
(7, 29, '', '', 0, 0),
(7, 30, 'K / Joe', 'Agent', 1, 0),
(7, 31, 'Deckard', 'Rick', 1, 0),
(7, 9, 'Luv', '', 0, 1),
(8, 34, '', '', 0, 0),
(8, 30, 'Wilder', 'Sebastian', 1, 0),
(8, 33, 'Dolan', 'Mia', 1, 0),
(9, 19, '', '', 0, 0),
(9, 20, 'Miller', 'John', 1, 0),
(9, 21, 'Ryan', 'James', 1, 0),
(10, 25, '', '', 0, 0),
(10, 2, 'Belfort', 'Jordan', 1, 0),
(10, 43, 'Lapaglia', 'Naomi', 1, 0),
(10, 10, 'Hanna', 'Mark', 0, 1),
(11, 1, '', '', 0, 0),
(11, 3, 'Farrier', '', 1, 0),
(11, 6, 'Soldat tremblant', '', 0, 1),
(11, 5, 'Bolton', 'Commander', 0, 1),
(11, 20, 'Dawson', 'Mr.', 0, 1);

-- --------------------------------------------------------

--

INSERT INTO `cinemas` (`idCinema`, `nomCinema`, `adresseCinema`, `codePostale`, `created_at`, `updated_at`) VALUES
(1, 'Cinéma Central', '123 Rue Principale, Paris', '69800', '2025-12-09 21:13:48', '2025-12-09 21:13:48'),
(2, 'Cinéma Lux', '45 Avenue de la République, Lyon', '12000', '2025-12-09 21:13:48', '2025-12-09 21:13:48'),
(3, 'Cinéma Etoile', '78 Boulevard Saint-Germain, Paris', '80756', '2025-12-09 21:13:48', '2025-12-09 21:13:48');





INSERT INTO `films` (`idFilm`, `titreFilm`, `descFilm`, `dateSortieFilm`, `dureeFilm`, `posterFilm`, `idGenre`, `created_at`, `updated_at`) VALUES
(1, 'The Dark Knight', 'Batman affronte le Joker, un criminel anarchiste qui plonge Gotham dans le chaos.', '2008-07-18', 152, 'dark_knight.jpg', 1, NULL, NULL),
(2, 'Oppenheimer', 'L\'histoire de J. Robert Oppenheimer et son rôle dans le développement de la bombe atomique.', '2023-07-21', 180, 'oppenheimer.jpg', 2, NULL, NULL),
(3, 'Titanic', 'Une histoire d\'amour tragique à bord du navire Titanic lors de son voyage inaugural.', '1997-12-19', 195, 'titanic.jpg', 3, NULL, NULL),
(4, 'Pulp Fiction', 'Les histoires entrelacées de plusieurs criminels à Los Angeles.', '1994-10-14', 154, 'pulp_fiction.jpg', 4, NULL, NULL),
(5, 'Fight Club', 'Un employé de bureau insomniaque fonde un club de combat clandestin.', '1999-10-15', 139, 'fight_club.jpg', 5, NULL, NULL),
(6, 'The Shawshank Redemption', 'L\'histoire d\'un homme condamné à perpétuité qui refuse de perdre espoir.', '1994-09-23', 142, 'shawshank.jpg', 5, NULL, NULL),
(7, 'Blade Runner 2049', 'Un blade runner découvre un secret qui pourrait plonger la société dans le chaos.', '2017-10-06', 164, 'blade_runner_2049.jpg', 6, NULL, NULL),
(8, 'La La Land', 'Une actrice en herbe et un musicien de jazz tombent amoureux à Los Angeles.', '2016-12-09', 128, 'la_la_land.jpg', 7, NULL, NULL),
(9, 'Il faut sauver le soldat Ryan', 'Pendant la Seconde Guerre mondiale, une équipe part sauver un parachutiste.', '1998-07-24', 169, 'saving_private_ryan.jpg', 8, NULL, NULL),
(10, 'The Wolf of Wall Street', 'L\'ascension et la chute du courtier en bourse Jordan Belfort.', '2013-12-25', 180, 'wolf_wall_street.jpg', 9, NULL, NULL),
(11, 'Dunkerque', 'L\'évacuation miraculeuse de soldats alliés encerclés à Dunkerque en 1940.', '2017-07-21', 106, 'dunkirk.jpg', 1, NULL, NULL);



--

INSERT INTO `film_realisateur` (`film_id`, `pers_id`) VALUES
(1, 1),
(2, 1),
(3, 36),
(4, 22),
(5, 27),
(7, 29),
(8, 34),
(9, 19),
(10, 25),
(11, 1);


--

INSERT INTO `film_scenariste` (`film_id`, `pers_id`) VALUES
(1, 1),
(2, 1),
(3, 36),
(4, 22),
(5, 27),
(7, 29),
(8, 34),
(9, 19),
(10, 25),
(11, 1);


--

INSERT INTO `genres` (`idGenre`, `libGenre`, `created_at`, `updated_at`) VALUES
(1, 'Action', NULL, NULL),
(2, 'Aventure', NULL, NULL),
(3, 'Comédie', NULL, NULL),
(4, 'Drame', NULL, NULL),
(5, 'Horreur', NULL, NULL),
(6, 'Fantastique', NULL, NULL),
(7, 'Science-fiction', NULL, NULL),
(8, 'Thriller', NULL, NULL),
(9, 'Animation', NULL, NULL),
(10, 'Documentaire', NULL, NULL);




INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_09_131405_create_personnes_table', 1),
(5, '2025_12_09_152658_create_genres_table', 1),
(6, '2025_12_09_153558_create_cinemas_table', 1),
(7, '2025_12_09_154536_create_typesalle_table', 1),
(8, '2025_12_09_155703_create_films_table', 1),
(9, '2025_12_09_183126_add_genre_id_to_films_table', 1),
(10, '2025_12_09_185930_create_film_personne_table', 1),
(11, '2025_12_09_195746_create_film_realisateur_table', 1),
(12, '2025_12_09_200159_create_film_scenariste_table', 1),
(13, '2025_12_09_201554_create_tarifs_table', 1),
(14, '2025_12_09_202503_create_salles_table', 1),
(15, '2025_12_09_202702_add_cinema_id_to_salles_table', 1),
(16, '2025_12_09_202858_add_typesalle_id_to_salles_table', 1),
(17, '2025_12_09_204039_create_salle_tarif_table', 1),
(18, '2025_12_11_122631_create_seances_table', 2);



INSERT INTO `personnes` (`idPers`, `nomPers`, `prePers`, `dateNaissPers`, `lieuNaissPers`, `photoPers`, `biblio`, `created_at`, `updated_at`) VALUES
(1, 'Nolan', 'Christopher', '1970-07-30', 'Londres, Angleterre', 'nolan.jpg', 'Réalisateur britannique reconnu pour ses films à l\'intrigue complexe et non-linéaire. Célèbre pour Inception, Interstellar, la trilogie The Dark Knight et Oppenheimer.', NULL, NULL),
(2, 'DiCaprio', 'Leonardo', '1974-11-11', 'Los Angeles, USA', 'dicaprio.jpg', 'Acteur américain oscarisé, icône d\'Hollywood depuis les années 90. Connu pour Titanic, Inception, The Revenant, The Wolf of Wall Street et sa collaboration avec Martin Scorsese.', NULL, NULL),
(3, 'Hardy', 'Tom', '1977-09-15', 'Londres, Angleterre', 'hardy.jpg', 'Acteur britannique polyvalent, remarqué pour ses rôles dans Inception, The Dark Knight Rises, Mad Max: Fury Road, Venom et la série Peaky Blinders.', NULL, NULL),
(4, 'Cotillard', 'Marion', '1975-09-30', 'Paris, France', 'cotillard.jpg', 'Actrice française oscarisée, reconnue internationalement. Célèbre pour La Môme, Inception, La Vie en Rose, Midnight in Paris et Annette.', NULL, NULL),
(5, 'Caine', 'Michael', '1933-03-14', 'Londres, Angleterre', 'caine.jpg', 'Acteur britannique légendaire, icône du cinéma depuis les années 60. Connu pour Alfie, The Dark Knight, Inception, Hannah and Her Sisters et The Cider House Rules.', NULL, NULL),
(6, 'Murphy', 'Cillian', '1976-05-25', 'Cork, Irlande', 'murphy.jpg', 'Acteur irlandais, célèbre pour son rôle dans Peaky Blinders, la trilogie Batman de Nolan, Inception, Dunkirk et Oppenheimer pour lequel il a remporté l\'Oscar.', NULL, NULL),
(7, 'Bale', 'Christian', '1974-01-30', 'Pembrokeshire, Pays de Galles', 'bale.jpg', 'Acteur britannique oscarisé, connu pour sa transformation physique. Célèbre pour American Psycho, la trilogie Batman de Nolan, The Fighter, The Machinist et Vice.', NULL, NULL),
(8, 'Ledger', 'Heath', '1979-04-04', 'Perth, Australie', 'ledger.jpg', 'Acteur australien disparu en 2008, posthumement oscarisé pour son rôle du Joker dans The Dark Knight. Également connu pour Brokeback Mountain et A Knight\'s Tale.', NULL, NULL),
(9, 'Hathaway', 'Anne', '1982-11-12', 'Brooklyn, USA', 'hathaway.jpg', 'Actrice américaine oscarisée, reconnue pour ses performances variées. Célèbre pour Les Misérables, The Devil Wears Prada, Interstellar, The Dark Knight Rises et The Princess Diaries.', NULL, NULL),
(10, 'McConaughey', 'Matthew', '1969-11-04', 'Uvalde, USA', 'mcconaughey.jpg', 'Acteur américain oscarisé, connu pour ses rôles charismatiques. Célèbre pour Dallas Buyers Club, Interstellar, True Detective, The Wolf of Wall Street et Magic Mike.', NULL, NULL),
(11, 'Chastain', 'Jessica', '1977-03-24', 'Sacramento, USA', 'chastain.jpg', 'Actrice américaine oscarisée, reconnue pour ses performances intenses. Célèbre pour Zero Dark Thirty, Interstellar, The Help, Molly\'s Game et The Eyes of Tammy Faye.', NULL, NULL),
(12, 'Downey Jr.', 'Robert', '1965-04-04', 'New York, USA', 'downey.jpg', 'Acteur américain, vedette du MCU dans le rôle d\'Iron Man. Connu pour sa résurrection de carrière avec Sherlock Holmes, The Avengers, Tropic Thunder et Chaplin.', NULL, NULL),
(13, 'Evans', 'Chris', '1981-06-13', 'Boston, USA', 'evans.jpg', 'Acteur américain, célèbre pour son rôle de Captain America dans le MCU. Également connu pour Snowpiercer, Knives Out et Fantastic Four.', NULL, NULL),
(14, 'Johansson', 'Scarlett', '1984-11-22', 'New York, USA', 'johansson.jpg', 'Actrice américaine, star du MCU dans le rôle de Black Widow. Reconnue pour Lost in Translation, Marriage Story, Lucy, Her et Jojo Rabbit.', NULL, NULL),
(15, 'Hemsworth', 'Chris', '1983-08-11', 'Melbourne, Australie', 'hemsworth.jpg', 'Acteur australien, célèbre pour son rôle de Thor dans le MCU. Connu pour Rush, Extraction, Snow White and the Huntsman et In the Heart of the Sea.', NULL, NULL),
(16, 'Ruffalo', 'Mark', '1967-11-22', 'Kenosha, USA', 'ruffalo.jpg', 'Acteur américain, interprète de Hulk dans le MCU. Reconnu pour Spotlight, Shutter Island, The Kids Are All Right et Zodiac.', NULL, NULL),
(17, 'Russo', 'Anthony', '1970-02-03', 'Cleveland, USA', 'russo_anthony.jpg', 'Réalisateur américain, codirecteur avec son frère Joe des blockbusters Marvel Avengers: Infinity War et Endgame. Également connu pour Captain America: The Winter Soldier.', NULL, NULL),
(18, 'Russo', 'Joe', '1971-07-18', 'Cleveland, USA', 'russo_joe.jpg', 'Réalisateur américain, codirecteur avec son frère Anthony des films Marvel les plus lucratifs. Également réalisateur de séries comme Community et Arrested Development.', NULL, NULL),
(19, 'Spielberg', 'Steven', '1946-12-18', 'Cincinnati, USA', 'spielberg.jpg', 'Réalisateur américain légendaire, pionnier du blockbuster moderne. Célèbre pour Jaws, E.T., Jurassic Park, Schindler\'s List, Saving Private Ryan et Indiana Jones.', NULL, NULL),
(20, 'Hanks', 'Tom', '1956-07-09', 'Concord, USA', 'hanks.jpg', 'Acteur américain double oscarisé, figure emblématique d\'Hollywood. Connu pour Forrest Gump, Saving Private Ryan, Cast Away, Philadelphia et Toy Story.', NULL, NULL),
(21, 'Damon', 'Matt', '1970-10-08', 'Cambridge, USA', 'damon.jpg', 'Acteur américain oscarisé pour le scénario de Good Will Hunting. Célèbre pour la saga Bourne, The Martian, Interstellar, Saving Private Ryan et Ocean\'s Eleven.', NULL, NULL),
(22, 'Tarantino', 'Quentin', '1963-03-27', 'Knoxville, USA', 'tarantino.jpg', 'Réalisateur américain culte, maître des dialogues et de la violence stylisée. Célèbre pour Pulp Fiction, Kill Bill, Inglourious Basterds, Django Unchained et Reservoir Dogs.', NULL, NULL),
(23, 'Thurman', 'Uma', '1970-04-29', 'Boston, USA', 'thurman.jpg', 'Actrice américaine, muse de Quentin Tarantino. Célèbre pour Kill Bill, Pulp Fiction, Gattaca, Batman & Robin et Dangerous Liaisons.', NULL, NULL),
(24, 'Pitt', 'Brad', '1963-12-18', 'Shawnee, USA', 'pitt.jpg', 'Acteur et producteur américain oscarisé. Connu pour Fight Club, Ocean\'s Eleven, Once Upon a Time in Hollywood, Se7en, Troy et Inglourious Basterds.', NULL, NULL),
(25, 'Scorsese', 'Martin', '1942-11-17', 'New York, USA', 'scorsese.jpg', 'Réalisateur américain oscarisé, maître du cinéma de gangsters. Célèbre pour Goodfellas, Taxi Driver, The Departed, The Wolf of Wall Street et Raging Bull.', NULL, NULL),
(26, 'De Niro', 'Robert', '1943-08-17', 'New York, USA', 'deniro.jpg', 'Acteur américain double oscarisé, légende du cinéma. Connu pour Taxi Driver, Raging Bull, Goodfellas, The Godfather Part II et Casino avec Scorsese.', NULL, NULL),
(27, 'Fincher', 'David', '1962-08-28', 'Denver, USA', 'fincher.jpg', 'Réalisateur américain, maître du thriller psychologique sombre. Célèbre pour Fight Club, Se7en, Gone Girl, The Social Network, Zodiac et Mindhunter.', NULL, NULL),
(28, 'Norton', 'Edward', '1969-08-18', 'Boston, USA', 'norton.jpg', 'Acteur américain reconnu pour ses rôles intenses. Célèbre pour Fight Club, American History X, The Illusionist, Birdman et Primal Fear.', NULL, NULL),
(29, 'Villeneuve', 'Denis', '1967-10-03', 'Trois-Rivières, Canada', 'villeneuve.jpg', 'Réalisateur québécois acclamé, maître de la science-fiction contemplative. Célèbre pour Dune, Blade Runner 2049, Arrival, Sicario et Prisoners.', NULL, NULL),
(30, 'Gosling', 'Ryan', '1980-11-12', 'London, Canada', 'gosling.jpg', 'Acteur canadien, star romantique et dramatique. Connu pour La La Land, Drive, Blade Runner 2049, The Notebook, Half Nelson et Barbie.', NULL, NULL),
(31, 'Ford', 'Harrison', '1942-07-13', 'Chicago, USA', 'ford.jpg', 'Acteur américain légendaire, héros d\'action iconique. Célèbre pour Star Wars, Indiana Jones, Blade Runner, The Fugitive et Air Force One.', NULL, NULL),
(33, 'Stone', 'Emma', '1988-11-06', 'Scottsdale, USA', 'stone.jpg', 'Actrice américaine oscarisée, reconnue pour sa versatilité. Célèbre pour La La Land, Birdman, Easy A, The Help, Cruella et Poor Things.', NULL, NULL),
(34, 'Chazelle', 'Damien', '1985-01-19', 'Providence, USA', 'chazelle.jpg', 'Réalisateur américain, plus jeune oscarisé à 32 ans. Célèbre pour La La Land, Whiplash, First Man et sa passion pour le jazz et la musique.', NULL, NULL),
(35, 'Winslet', 'Kate', '1975-10-05', 'Reading, Angleterre', 'winslet.jpg', 'Actrice britannique oscarisée, icône depuis Titanic. Reconnue pour The Reader, Eternal Sunshine, Revolutionary Road, Steve Jobs et Mare of Easttown.', NULL, NULL),
(36, 'Cameron', 'James', '1954-08-16', 'Kapuskasing, Canada', 'cameron.jpg', 'Réalisateur canadien visionnaire, pionnier des effets spéciaux. Célèbre pour Titanic, Avatar, Terminator, Aliens et The Abyss.', NULL, NULL),
(37, 'Page', 'Ellen', '1987-02-21', 'Halifax, Canada', 'page.jpg', 'Acteur canadien transgenre (Elliot Page depuis 2020). Connu pour Juno, Inception, X-Men, The Umbrella Academy et Hard Candy.', NULL, NULL),
(38, 'Watanabe', 'Ken', '1959-10-21', 'Koide, Japon', 'watanabe.jpg', 'Acteur japonais de renommée internationale. Célèbre pour The Last Samurai, Inception, Letters from Iwo Jima, Batman Begins et Godzilla.', NULL, NULL),
(39, 'Gordon-Levitt', 'Joseph', '1981-02-17', 'Los Angeles, USA', 'gordon_levitt.jpg', 'Acteur américain polyvalent, également réalisateur. Connu pour Inception, Looper, 500 Days of Summer, The Dark Knight Rises et Don Jon.', NULL, NULL),
(40, 'Eckhart', 'Aaron', '1968-03-12', 'Cupertino, USA', 'eckhart.jpg', 'Acteur américain reconnu pour ses seconds rôles marquants. Célèbre pour The Dark Knight, Thank You for Smoking, Erin Brockovich et Olympus Has Fallen.', NULL, NULL),
(41, 'Oldman', 'Gary', '1958-03-21', 'Londres, Angleterre', 'oldman.jpg', 'Acteur britannique oscarisé, caméléon du cinéma. Connu pour Darkest Hour, The Dark Knight, Harry Potter, Léon et Tinker Tailor Soldier Spy.', NULL, NULL),
(42, 'Freeman', 'Morgan', '1937-06-01', 'Memphis, USA', 'freeman.jpg', 'Acteur américain oscarisé, voix légendaire du cinéma. Célèbre pour The Shawshank Redemption, Million Dollar Baby, Se7en, The Dark Knight et Driving Miss Daisy.', NULL, NULL),
(43, 'Robbie', 'Margot', '1990-07-02', 'Dalby, Australie', 'robbie.jpg', 'Actrice et productrice australienne, star montante d\'Hollywood. Connue pour The Wolf of Wall Street, Suicide Squad, I Tonya, Once Upon a Time in Hollywood et Barbie.', NULL, NULL),
(44, 'Travolta', 'John', '1954-02-18', 'Englewood, USA', 'travolta.jpg', 'Acteur américain iconique, star de la danse et de l\'action. Célèbre pour Grease, Pulp Fiction, Saturday Night Fever, Face/Off et Get Shorty.', NULL, NULL),
(45, 'Jackson', 'Samuel L.', '1948-12-21', 'Washington, USA', 'jackson.jpg', 'Acteur américain légendaire, l\'un des plus prolifiques d\'Hollywood. Connu pour Pulp Fiction, le MCU, Django Unchained, The Hateful Eight et Unbreakable.', NULL, NULL),
(46, 'Keitel', 'Harvey', '1939-05-13', 'Brooklyn, USA', 'keitel.jpg', 'Acteur américain vétéran, collaborateur de Scorsese et Tarantino. Célèbre pour Reservoir Dogs, Pulp Fiction, Taxi Driver, Mean Streets et The Piano.', NULL, NULL);

-- --------------------------------------------------------

--


INSERT INTO `salles` (`idSalle`, `capaciteSal`, `idTypeSalle`, `created_at`, `updated_at`, `idCinema`) VALUES
(1, 200, 1, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 1),
(2, 150, 2, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 1),
(3, 100, 5, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 1),
(4, 180, 3, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 2),
(5, 120, 4, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 2),
(6, 90, 5, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 2),
(7, 250, 1, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 3),
(8, 140, 2, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 3),
(9, 160, 3, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 3),
(10, 110, 5, '2025-12-09 21:13:48', '2025-12-09 21:13:48', 3);

-- --------------------------------------------------------

-
--

INSERT INTO `salle_tarif` (`idSalle`, `idTarif`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 33),
(1, 34),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 24),
(2, 25),
(2, 27),
(2, 38),
(2, 39),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 24),
(3, 25),
(3, 26),
(3, 29),
(3, 30),
(3, 33),
(3, 34),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 24),
(4, 25),
(4, 29),
(4, 31),
(4, 32),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43);



INSERT INTO `seances` (`idSeance`, `heureSeance`, `dateSeance`, `dureeSeance`, `created_at`, `updated_at`) VALUES
(1, '09:30', '2025-02-12', 90, NULL, NULL),
(2, '11:00', '2025-02-12', 60, NULL, NULL),
(3, '15:15', '2025-02-13', 120, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oCTTOfOy4IkmwIOyshynpZRw9weAVeBvENvz3x06', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFE5WlNGeFc4Y2paQVJMRlYzenFUam5xckRRcmhnbmVRUmdUUHlUWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYWxsZXMiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765316003),
('DX3H4f5vvNobvSWYP5eQ2KKSIPN3CFB0jx5QwHEq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXAwbmk2S1pRUDdyWVIwM3hLbDZiT0diTzJ1OHBQQjJkemZSTER4UCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9maWxtcyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765456907);

-- --------------------------------------------------------


--

INSERT INTO `tarifs` (`idTarif`, `libTarif`, `prixTarif`, `created_at`, `updated_at`) VALUES
(1, 'Tarif Étudiant', 8.50, NULL, NULL),
(2, 'Tarif Groupe (10+)', 9.00, NULL, NULL),
(3, 'Tarif Famille', 35.00, NULL, NULL),
(4, 'Tarif Matinée', 6.50, NULL, NULL),
(5, 'Tarif Ciné-Pass', 15.00, NULL, NULL);

-- --------------------------------------------------------



INSERT INTO `typesalles` (`idTypeSalle`, `libTypeSalle`, `prixTypeSalle`, `created_at`, `updated_at`) VALUES
(1, 'Salle IMAX', 3.00, NULL, NULL),
(2, 'Salle Dolby Atmos', 2.00, NULL, NULL),
(3, 'Salle 4DX', 7.00, NULL, NULL),
(4, 'Salle ICE Immersive', 4.00, NULL, NULL),
(5, 'Salle Standard', 0.00, NULL, NULL);

