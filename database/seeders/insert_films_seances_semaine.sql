-- 3 films sortis le mercredi 19 février 2025
-- Séances sur la semaine du 17 au 23 février 2025 (date actuelle : 22/02/2025)

-- ========== FILMS (sortis le mercredi 19/02/2025) ==========
INSERT INTO `films` (`idFilm`, `titreFilm`, `descFilm`, `dateSortieFilm`, `dureeFilm`, `posterFilm`, `idGenre`, `created_at`, `updated_at`) VALUES
(101, 'Echoes of Tomorrow', 'En 2045, une physicienne doit traverser les dimensions pour empêcher l\'effondrement du temps. Un thriller science-fiction sur les paradoxes temporels.', '2025-02-19', 128, 'echoes_tomorrow.jpg', 1, NOW(), NOW()),
(102, 'Rapid Response', 'Une unité d\'élite doit neutraliser une cellule terroriste avant qu\'elle ne frappe la capitale. Course contre la montre haletante.', '2025-02-19', 115, 'rapid_response.jpg', 2, NOW(), NOW()),
(103, 'Sous les étoiles de Paris', 'Deux inconnus se retrouvent chaque nuit sur les toits de Paris. Une comédie romantique sur les secondes chances.', '2025-02-19', 105, 'etoiles_paris.jpg', 3, NOW(), NOW());

-- ========== SÉANCES - Semaine du lundi 17 au dimanche 23 février 2025 ==========
-- Film 101 (Echoes of Tomorrow - 128 min)
INSERT INTO `seances` (`heureSeance`, `dateSeance`, `dureeSeance`, `idSalle`, `idFilm`, `created_at`, `updated_at`) VALUES
('14:00', '2025-02-17', 128, 1, 101, NOW(), NOW()),
('18:30', '2025-02-17', 128, 2, 101, NOW(), NOW()),
('21:00', '2025-02-17', 128, 3, 101, NOW(), NOW()),
('13:30', '2025-02-18', 128, 4, 101, NOW(), NOW()),
('17:00', '2025-02-18', 128, 5, 101, NOW(), NOW()),
('20:45', '2025-02-18', 128, 1, 101, NOW(), NOW()),
('14:15', '2025-02-19', 128, 2, 101, NOW(), NOW()),
('18:00', '2025-02-19', 128, 6, 101, NOW(), NOW()),
('21:15', '2025-02-19', 128, 7, 101, NOW(), NOW()),
('10:30', '2025-02-20', 128, 1, 101, NOW(), NOW()),
('15:00', '2025-02-20', 128, 3, 101, NOW(), NOW()),
('19:30', '2025-02-20', 128, 4, 101, NOW(), NOW()),
('14:00', '2025-02-21', 128, 5, 101, NOW(), NOW()),
('17:30', '2025-02-21', 128, 6, 101, NOW(), NOW()),
('20:30', '2025-02-21', 128, 2, 101, NOW(), NOW()),
('11:00', '2025-02-22', 128, 1, 101, NOW(), NOW()),
('14:30', '2025-02-22', 128, 3, 101, NOW(), NOW()),
('18:00', '2025-02-22', 128, 7, 101, NOW(), NOW()),
('21:00', '2025-02-22', 128, 2, 101, NOW(), NOW()),
('13:00', '2025-02-23', 128, 4, 101, NOW(), NOW()),
('16:30', '2025-02-23', 128, 5, 101, NOW(), NOW()),
('20:00', '2025-02-23', 128, 6, 101, NOW(), NOW());

-- Film 102 (Rapid Response - 115 min)
INSERT INTO `seances` (`heureSeance`, `dateSeance`, `dureeSeance`, `idSalle`, `idFilm`, `created_at`, `updated_at`) VALUES
('15:30', '2025-02-17', 115, 4, 102, NOW(), NOW()),
('19:00', '2025-02-17', 115, 5, 102, NOW(), NOW()),
('22:00', '2025-02-17', 115, 6, 102, NOW(), NOW()),
('14:00', '2025-02-18', 115, 2, 102, NOW(), NOW()),
('17:15', '2025-02-18', 115, 3, 102, NOW(), NOW()),
('20:30', '2025-02-18', 115, 7, 102, NOW(), NOW()),
('10:00', '2025-02-19', 115, 1, 102, NOW(), NOW()),
('14:45', '2025-02-19', 115, 4, 102, NOW(), NOW()),
('18:30', '2025-02-19', 115, 5, 102, NOW(), NOW()),
('21:30', '2025-02-19', 115, 2, 102, NOW(), NOW()),
('13:15', '2025-02-20', 115, 6, 102, NOW(), NOW()),
('16:45', '2025-02-20', 115, 7, 102, NOW(), NOW()),
('20:00', '2025-02-20', 115, 1, 102, NOW(), NOW()),
('11:30', '2025-02-21', 115, 3, 102, NOW(), NOW()),
('15:00', '2025-02-21', 115, 4, 102, NOW(), NOW()),
('19:15', '2025-02-21', 115, 1, 102, NOW(), NOW()),
('10:30', '2025-02-22', 115, 5, 102, NOW(), NOW()),
('14:00', '2025-02-22', 115, 6, 102, NOW(), NOW()),
('17:30', '2025-02-22', 115, 4, 102, NOW(), NOW()),
('21:00', '2025-02-22', 115, 3, 102, NOW(), NOW()),
('12:00', '2025-02-23', 115, 7, 102, NOW(), NOW()),
('15:30', '2025-02-23', 115, 1, 102, NOW(), NOW()),
('19:00', '2025-02-23', 115, 2, 102, NOW(), NOW());

-- Film 103 (Sous les étoiles de Paris - 105 min)
INSERT INTO `seances` (`heureSeance`, `dateSeance`, `dureeSeance`, `idSalle`, `idFilm`, `created_at`, `updated_at`) VALUES
('13:00', '2025-02-17', 105, 6, 103, NOW(), NOW()),
('16:30', '2025-02-17', 105, 7, 103, NOW(), NOW()),
('19:30', '2025-02-17', 105, 1, 103, NOW(), NOW()),
('10:30', '2025-02-18', 105, 1, 103, NOW(), NOW()),
('14:30', '2025-02-18', 105, 6, 103, NOW(), NOW()),
('18:00', '2025-02-18', 105, 2, 103, NOW(), NOW()),
('15:30', '2025-02-19', 105, 3, 103, NOW(), NOW()),
('19:00', '2025-02-19', 105, 1, 103, NOW(), NOW()),
('21:45', '2025-02-19', 105, 4, 103, NOW(), NOW()),
('12:00', '2025-02-20', 105, 2, 103, NOW(), NOW()),
('16:00', '2025-02-20', 105, 5, 103, NOW(), NOW()),
('19:45', '2025-02-20', 105, 6, 103, NOW(), NOW()),
('14:00', '2025-02-21', 105, 7, 103, NOW(), NOW()),
('17:00', '2025-02-21', 105, 2, 103, NOW(), NOW()),
('20:15', '2025-02-21', 105, 3, 103, NOW(), NOW()),
('13:00', '2025-02-22', 105, 4, 103, NOW(), NOW()),
('16:00', '2025-02-22', 105, 5, 103, NOW(), NOW()),
('19:00', '2025-02-22', 105, 6, 103, NOW(), NOW()),
('21:30', '2025-02-22', 105, 1, 103, NOW(), NOW()),
('11:00', '2025-02-23', 105, 3, 103, NOW(), NOW()),
('14:30', '2025-02-23', 105, 6, 103, NOW(), NOW()),
('17:30', '2025-02-23', 105, 7, 103, NOW(), NOW()),
('20:30', '2025-02-23', 105, 2, 103, NOW(), NOW());
