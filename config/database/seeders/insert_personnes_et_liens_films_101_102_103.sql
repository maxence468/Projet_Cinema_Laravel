-- Personnes cohérentes (réalisateurs + acteurs) pour les 3 derniers films (101, 102, 103)
-- Puis liens : table realise (réalisateur) et table caste (acteurs avec rôle)
-- Si votre table personnes a déjà des idPers > 101, adaptez les idPers ci-dessous.

-- ========== RÉALISATEURS (1 par film) ==========
INSERT INTO `personnes` (`idPers`, `nomPers`, `prePers`, `dateNaissPers`, `lieuNaissPers`, `photoPers`, `biblio`, `created_at`, `updated_at`) VALUES
(102, 'Mercier', 'Lucas', '1978-05-12', 'Lyon', 'mercier_lucas.jpg', 'Réalisateur français, spécialisé en science-fiction. Ancien assistant de Denis Villeneuve.', NOW(), NOW()),
(103, 'Bernard', 'Marc', '1972-11-08', 'Paris', 'bernard_marc.jpg', 'Réalisateur et scénariste, connu pour ses thrillers et films d\'action. César du meilleur premier film.', NOW(), NOW()),
(104, 'Moreau', 'Claire', '1985-03-22', 'Bordeaux', 'moreau_claire.jpg', 'Réalisatrice et actrice. Films intimistes et comédies romantiques. Prix Jean-Vigo 2022.', NOW(), NOW());

-- ========== ACTEURS ==========
-- Film 101 (Echoes of Tomorrow) - 2 acteurs
INSERT INTO `personnes` (`idPers`, `nomPers`, `prePers`, `dateNaissPers`, `lieuNaissPers`, `photoPers`, `biblio`, `created_at`, `updated_at`) VALUES
(105, 'Blanc', 'Marie', '1990-07-14', 'Paris', 'blanc_marie.jpg', 'Actrice française. Formation théâtre national. Révélation aux César 2023.', NOW(), NOW()),
(106, 'Girard', 'Antoine', '1982-01-30', 'Marseille', 'girard_antoine.jpg', 'Acteur de cinéma et de série. Nombreux seconds rôles au cinéma français.', NOW(), NOW());

-- Film 102 (Rapid Response) - 2 acteurs
INSERT INTO `personnes` (`idPers`, `nomPers`, `prePers`, `dateNaissPers`, `lieuNaissPers`, `photoPers`, `biblio`, `created_at`, `updated_at`) VALUES
(107, 'Petit', 'David', '1978-09-05', 'Lille', 'petit_david.jpg', 'Acteur et cascadeur. Rôles dans des films d\'action français et internationaux.', NOW(), NOW()),
(108, 'Rousseau', 'Sarah', '1988-12-11', 'Toulouse', 'rousseau_sarah.jpg', 'Actrice. César du meilleur espoir féminin. Films d\'action et thrillers.', NOW(), NOW());

-- Film 103 (Sous les étoiles de Paris) - 2 acteurs
INSERT INTO `personnes` (`idPers`, `nomPers`, `prePers`, `dateNaissPers`, `lieuNaissPers`, `photoPers`, `biblio`, `created_at`, `updated_at`) VALUES
(109, 'Martin', 'Léo', '1992-04-18', 'Nantes', 'martin_leo.jpg', 'Acteur. Rôles dans des comédies romantiques et drames. Nomination César 2024.', NOW(), NOW()),
(110, 'Laurent', 'Julie', '1995-08-03', 'Strasbourg', 'laurent_julie.jpg', 'Actrice. Formation Cours Florent. Révélation dans le cinéma français contemporain.', NOW(), NOW());

-- ========== LIENS RÉALISATEURS (table realise) ==========
-- Film 101 -> Mercier Lucas | Film 102 -> Bernard Marc | Film 103 -> Moreau Claire
INSERT INTO `realise` (`film_id`, `pers_id`) VALUES
(101, 102),
(102, 103),
(103, 104);

-- ========== LIENS ACTEURS (table caste : nomJoue/preJoue = nom du personnage) ==========
-- Film 101 - Echoes of Tomorrow
INSERT INTO `caste` (`film_id`, `pers_id`, `nomJoue`, `preJoue`, `principale`, `secondaire`) VALUES
(101, 105, 'Keller', 'Dr. Anna', 1, 0),
(101, 106, 'Vogel', 'Marcus', 0, 1);

-- Film 102 - Rapid Response
INSERT INTO `caste` (`film_id`, `pers_id`, `nomJoue`, `preJoue`, `principale`, `secondaire`) VALUES
(102, 107, 'Stone', 'Commandant Alex', 1, 0),
(102, 108, 'Chen', 'Capitaine Li', 0, 1);

-- Film 103 - Sous les étoiles de Paris
INSERT INTO `caste` (`film_id`, `pers_id`, `nomJoue`, `preJoue`, `principale`, `secondaire`) VALUES
(103, 109, 'Dupont', 'Antoine', 1, 0),
(103, 110, 'Bernard', 'Camille', 0, 1);
