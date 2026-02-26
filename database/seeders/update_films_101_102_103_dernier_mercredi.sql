-- Met à jour la date de sortie des films 101, 102, 103 au dernier mercredi (18)
-- Dernier mercredi = 18 février (2026 si on est en février 2026)

UPDATE `films`
SET `dateSortieFilm` = '2026-02-18', `updated_at` = NOW()
WHERE `idFilm` IN (101, 102, 103);
