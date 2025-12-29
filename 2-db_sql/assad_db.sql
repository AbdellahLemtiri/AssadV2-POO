create database assad_db;

use assad_db;

CREATE TABLE habitats (
    id_habitat INT PRIMARY KEY AUTO_INCREMENT,
    nom_habitat VARCHAR(100) NOT NULL,
    type_climat VARCHAR(100) NOT NULL,
    description_habitat VARCHAR(500) not NULL,
    zone_zoo VARCHAR(100) NOT NULL
);

CREATE TABLE animaux (
    id_animal INT PRIMARY KEY AUTO_INCREMENT,
    nom_animal VARCHAR(100) NOT NULL,
    espece VARCHAR(100) NOT NULL,
    alimentation_animal VARCHAR(100) NOT NULL,
    image_url VARCHAR(555) NOT NULL,
    pays_origine VARCHAR(100) NOT NULL,
    description_animal VARCHAR(500) NOT NULL,
    id_habitat INT NOT NULL,
    FOREIGN KEY (id_habitat) REFERENCES habitats (id_habitat) ON DELETE CASCADE
);

CREATE TABLE utilisateurs (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom_utilisateur VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(50) NOT NULL,
    motpasse_hash VARCHAR(255) NOT NULL,
    Approuver_utilisateur INT DEFAULT 1,
    statut_utilisateur INT DEFAULT 1,
    pays_utilisateur VARCHAR(50),
    constraint ch_role check (
        role = "guide"
        or role = "admin"
        or role = "visiteur"
    )
);


DELETE from utilisateurs WHERE `Approuver_utilisateur` = 0;

CREATE TABLE visitesguidees (
    id_visite INT PRIMARY KEY AUTO_INCREMENT,
    titre_visite VARCHAR(255) NOT NULL,
    description_visite VARCHAR(500),
    dateheure_viste DATETIME NOT NULL,
    langue__visite VARCHAR(50) NOT NULL,
    capacite_max__visite INT NOT NULL,
    duree__visite TIME,
    prix__visite INT NOT NULL,
    statut__visite INT DEFAULT 1,
    id_guide INT NOT NULL,
    FOREIGN KEY (id_guide) REFERENCES utilisateurs (id_utilisateur) on delete CASCADE
);

UPDATE utilisateurs
set
    statut_utilisateur = 1
WHERE
    id_utilisateur = 1;

CREATE TABLE etapesvisite (
    id_etape INT PRIMARY KEY AUTO_INCREMENT,
    titre_etape VARCHAR(255) NOT NULL,
    description_etape VARCHAR(500),
    ordre_etape INT NOT NULL,
    id_visite INT NOT NULL,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees (id_visite) ON DELETE CASCADE
);

CREATE TABLE reservations (
    id_reservations INT PRIMARY KEY AUTO_INCREMENT,
    id_visite INT NOT NULL,
    id_utilisateur INT NOT NULL,
    nb_personnes INT NOT NULL,
    date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees (id_visite) ON DELETE CASCADE,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id_utilisateur) ON DELETE CASCADE
);


CREATE TABLE commentaires (
    id_commentaire INT PRIMARY KEY AUTO_INCREMENT,
    id_visite INT NOT NULL,
    id_utilisateur INT NOT NULL,
    note INT,
    texte VARCHAR(500),
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees (id_visite) ON DELETE CASCADE,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id_utilisateur) ON DELETE CASCADE
);

INSERT INTO
    habitats (
        nom_habitat,
        type_climat,
        description_habitat,
        zone_zoo
    )
VALUES (
        'Savane',
        'Tropical sec',
        'Vaste plaine avec herbes hautes et acacias.',
        'Zone d'
    ),
    (
        'Savane Africaine',
        'Tropical sec',
        'Vaste plaine avec herbes hautes et acacias.',
        'Zone A'
    ),
    (
        'Forêt Tropicale',
        'Humide',
        'Environnement dense avec forte humidité et végétation luxuriante.',
        'Zone B'
    ),
    (
        'Pôle Nord',
        'Polaire',
        'Zone glacée avec bassins d''eau froide.',
        'Zone C'
    );
INSERT INTO habitats (nom_habitat, type_climat, description_habitat, zone_zoo) VALUES
('Savane Africaine', 'Tropical Sec', 'Plaines herbeuses vastes pour les grands mammifères.', 'Zone Afrique'),
('Forêt Tropicale', 'Humide', 'Environnement dense avec une humidité élevée et beaucoup de végétation.', 'Zone Amazonie'),
('Banquise Arctique', 'Polaire', 'Zone réfrigérée avec bassins d’eau glacée pour ours et pingouins.', 'Zone Nord'),
('Désert du Sahara', 'Aride', 'Sable chaud et rocailles pour les espèces nocturnes et reptiles.', 'Zone Afrique'),
('Montagnes Rocheuses', 'Tempéré', 'Escarpements rocheux pour les chèvres de montagne et pumas.', 'Zone Amérique'),
('Marais de Floride', 'Marécageux', 'Eaux peu profondes et végétation dense pour les alligators.', 'Zone Amérique'),
('Plaines d’Australie', 'Semi-aride', 'Espaces ouverts pour les kangourous et émeus.', 'Zone Océanie'),
('Forêt de Bambous', 'Tempéré Humide', 'Habitat spécifique pour les pandas géants.', 'Zone Asie'),
('Récif Corallien', 'Aquatique', 'Aquarium géant simulant les fonds marins tropicaux.', 'Zone Aquatique'),
('La Volière Royale', 'Aérien', 'Filet de protection géant permettant le vol libre des oiseaux.', 'Zone Oiseaux'),
('Serpentarium Central', 'Contrôlé', 'Vivariums avec température et humidité régulées.', 'Zone Reptiles'),
('Sous-bois Européen', 'Tempéré', 'Forêt de feuillus pour les cerfs et les loups.', 'Zone Europe'),
('Île des Primates', 'Tropical', 'Îlot entouré d’eau pour les chimpanzés et gorilles.', 'Zone Afrique'),
('Steppes de Mongolie', 'Continental', 'Climat rude pour les chevaux de Przewalski.', 'Zone Asie'),
('Bassin des Otaries', 'Marin', 'Grand bassin avec gradins pour les spectacles.', 'Zone Aquatique');
INSERT INTO utilisateurs (nom_utilisateur, email, role, motpasse_hash, pays_utilisateur) VALUES
('Ahmed Alami', 'ahmed@zoo.com', 'admin', 'hash_admin_1', 'Maroc'),
('Sarah Martin', 'sarah.guide@zoo.com', 'guide', 'hash_guide_1', 'France'),
('John Doe', 'john.visitor@mail.com', 'visiteur', 'hash_pass_1', 'USA'),
('Yassine Benani', 'yassine.guide@zoo.com', 'guide', 'hash_guide_2', 'Maroc'),
('Elena Rodriguez', 'elena@mail.es', 'visiteur', 'hash_pass_2', 'Espagne'),
('Amine Slimani', 'amine.guide@zoo.com', 'guide', 'hash_guide_3', 'Maroc'),
('Sophie Lefebvre', 'sophie@zoo.com', 'admin', 'hash_admin_2', 'Belgique'),
('Kenji Tanaka', 'kenji@mail.jp', 'visiteur', 'hash_pass_3', 'Japon'),
('Layla Toumi', 'layla.guide@zoo.com', 'guide', 'hash_guide_4', 'Tunisie'),
('Marc Dupont', 'marc@mail.fr', 'visiteur', 'hash_pass_4', 'France'),
('Fatima Zahra', 'fatima.guide@zoo.com', 'guide', 'hash_guide_5', 'Maroc'),
('Hans Müller', 'hans@mail.de', 'visiteur', 'hash_pass_5', 'Allemagne'),
('Omar Khayam', 'omar@zoo.com', 'admin', 'hash_admin_3', 'Maroc'),
('Chloé Bernard', 'chloe.guide@zoo.com', 'guide', 'hash_guide_6', 'France'),
('Paolo Rossi', 'paolo@mail.it', 'visiteur', 'hash_pass_6', 'Italie');

INSERT INTO animaux (nom_animal, espece, alimentation_animal, image_url, pays_origine, description_animal, id_habitat) VALUES
('Simba', 'Lion d’Afrique', 'Carnivore', 'lion.jpg', 'Kenya', 'Le roi de la savane.', 1),
('Bambou', 'Panda Géant', 'Herbivore', 'panda.jpg', 'Chine', 'Grand mangeur de bambou.', 8),
('Flipper', 'Grand Dauphin', 'Piscivore', 'dauphin.jpg', 'Océan Atlantique', 'Animal très intelligent.', 15),
('Polaire', 'Ours Blanc', 'Carnivore', 'ours.jpg', 'Groenland', 'Maître de la banquise.', 3),
('George', 'Tortue Géante', 'Herbivore', 'tortue.jpg', 'Galapagos', 'Vivre plus de 100 ans.', 11),
('Kiko', 'Girafe', 'Herbivore', 'girafe.jpg', 'Tanzanie', 'Cou immense pour atteindre les feuilles.', 1),
('Abu', 'Chimpanzé', 'Omnivore', 'singe.jpg', 'Congo', 'Très proche de l’homme.', 13),
('Snappy', 'Alligator', 'Carnivore', 'alligator.jpg', 'USA', 'Prédateur redoutable des marais.', 6),
('Skippy', 'Kangourou Roux', 'Herbivore', 'kangourou.jpg', 'Australie', 'Champion du saut.', 7),
('Nemo', 'Poisson Clown', 'Omnivore', 'nemo.jpg', 'Indonésie', 'Petit poisson coloré.', 9),
('Igor', 'Loup Gris', 'Carnivore', 'loup.jpg', 'Russie', 'Vit et chasse en meute.', 12),
('Zaza', 'Zèbre', 'Herbivore', 'zebre.jpg', 'Afrique du Sud', 'Rayures uniques pour chaque individu.', 1),
('Dumbo', 'Éléphant d’Asie', 'Herbivore', 'elephant.jpg', 'Inde', 'Le plus grand mammifère terrestre.', 14),
('Rio', 'Ara Bleu', 'Frugivore', 'ara.jpg', 'Brésil', 'Oiseau aux couleurs éclatantes.', 10),
('Cobra', 'Cobra Royal', 'Carnivore', 'cobra.jpg', 'Thaïlande', 'Serpent venimeux impressionnant.', 11);

INSERT INTO visitesguidees (titre_visite, description_visite, dateheure_viste, langue__visite, capacite_max__visite, duree__visite, prix__visite, id_guide) VALUES
('Safari Matinal', 'Découvrez les lions au réveil.', '2024-05-10 09:00:00', 'Français', 20, '02:00:00', 50, 2),
('Mystères d’Amazonie', 'Plongée au cœur de la jungle.', '2024-05-10 11:00:00', 'Anglais', 15, '01:30:00', 40, 4),
('Le Monde Glacé', 'Visite spéciale zone polaire.', '2024-05-11 10:00:00', 'Français', 10, '01:00:00', 60, 6),
('Secrets des Reptiles', 'Frissons garantis avec nos serpents.', '2024-05-11 14:00:00', 'Arabe', 12, '01:15:00', 30, 9),
('Le Vol des Oiseaux', 'Spectacle de fauconnerie inclus.', '2024-05-12 15:30:00', 'Français', 30, '02:00:00', 45, 11),
('Nocturne au Zoo', 'Observez les animaux de nuit.', '2024-05-12 21:00:00', 'Anglais', 10, '03:00:00', 100, 14),
('Éveil de l’Océan', 'Nourrissage des otaries.', '2024-05-13 10:00:00', 'Français', 25, '01:00:00', 35, 2),
('Géants d’Asie', 'Rencontre avec les éléphants.', '2024-05-13 14:00:00', 'Anglais', 15, '01:45:00', 55, 4),
('Safari VIP', 'Tour en jeep privée.', '2024-05-14 09:00:00', 'Français', 5, '04:00:00', 250, 6),
('Atelier Enfants', 'Apprendre à soigner les lapins.', '2024-05-14 11:00:00', 'Arabe', 10, '01:00:00', 20, 9),
('Trésors d’Australie', 'Focus sur les marsupiaux.', '2024-05-15 10:00:00', 'Français', 15, '01:30:00', 40, 11),
('Immersion Marine', 'Tunnel sous l’aquarium.', '2024-05-15 16:00:00', 'Anglais', 20, '01:00:00', 50, 14),
('Primates et Cie', 'Comportement des singes.', '2024-05-16 10:00:00', 'Français', 15, '02:00:00', 45, 2),
('Flore du Monde', 'Découverte des plantes rares.', '2024-05-16 14:00:00', 'Arabe', 20, '01:30:00', 30, 4),
('Grand Tour du Zoo', 'La totale en une journée.', '2024-05-17 09:00:00', 'Français', 25, '06:00:00', 120, 6);

INSERT INTO etapesvisite (titre_etape, description_etape, ordre_etape, id_visite) VALUES
('Entrée Savane', 'Briefing de sécurité.', 1, 1),
('Le Rocher des Lions', 'Observation du mâle alpha.', 2, 1),
('Le point d’eau', 'Voir les zèbres boire.', 3, 1),
('Entrée Jungle', 'Distribution de répulsif.', 1, 2),
('Pont Suspendu', 'Vue panoramique.', 2, 2),
('La Grotte Humide', 'Recherche des jaguars.', 3, 2),
('Sas de Froid', 'Mise des manteaux.', 1, 3),
('Bassin des Manchots', 'Spectacle de nage.', 2, 3),
('Terrarium Python', 'Explication sur le venin.', 1, 4),
('Arrivée Volière', 'Entrée silencieuse.', 1, 5),
('Départ Jeep', 'Vérification ceintures.', 1, 9),
('Bassin Tactile', 'Toucher les raies.', 1, 12),
('Observation Chimpanzés', 'Jeux des petits.', 1, 13),
('Jardin Botanique', 'Les fleurs exotiques.', 1, 14),
('Final Boutique', 'Temps libre souvenirs.', 5, 15);

INSERT INTO reservations (id_visite, id_utilisateur, nb_personnes) VALUES
(1, 3, 2), (1, 5, 4), (2, 8, 1), (2, 10, 3), (3, 12, 2),
(4, 15, 5), (5, 3, 2), (6, 5, 1), (7, 8, 4), (8, 10, 2),
(9, 12, 2), (10, 15, 3), (11, 3, 1), (12, 5, 2), (13, 8, 2);
INSERT INTO commentaires (id_visite, id_utilisateur, note, texte) VALUES
(1, 3, 5, 'Magnifique expérience avec les lions !'),
(1, 5, 4, 'Très instructif mais un peu chaud.'),
(2, 8, 5, 'Le guide était passionné.'),
(3, 12, 3, 'Un peu trop court pour le prix.'),
(4, 15, 5, 'Mes enfants ont adoré les serpents.'),
(5, 3, 4, 'Les oiseaux sont superbes.'),
(6, 5, 5, 'La visite de nuit est magique.'),
(7, 8, 2, 'Les otaries dormaient, dommage.'),
(8, 10, 4, 'Éléphants impressionnants.'),
(9, 12, 5, 'Le prix en vaut la peine pour la jeep.'),
(10, 15, 5, 'Génial pour les petits.'),
(11, 3, 4, 'Kangourous très mignons.'),
(12, 5, 5, 'L aquarium est géant !'),
(13, 8, 4, 'Singes très drôles.'),
(15, 15, 5, 'La meilleure journée de ma vie !');
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1546182990-dffeafbe841d?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Simba';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1564349683136-77e08bef1ef1?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Bambou';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1607153333879-c174d265f1d2?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Flipper';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1589656966895-2f33e7653819?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Polaire';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1518467166778-b88f373ffec7?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'George';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1526202707242-79d39d7dd82d?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Kiko';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1540573133985-87b6da6d54a9?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Abu';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1610471167440-276906a59929?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Snappy';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1591153510212-ac5bb70564aa?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Skippy';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1524704659698-1f6e11240b03?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Nemo';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Igor';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1501705388883-4ed8a543392c?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Zaza';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1557008075-7f2c5efa4cfd?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Dumbo';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1552728089-57bdde30eba3?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Rio';
UPDATE animaux SET image_url = 'https://images.unsplash.com/photo-1531386151447-ad762e755d47?auto=format&fit=crop&w=800&q=80' WHERE nom_animal = 'Cobra';