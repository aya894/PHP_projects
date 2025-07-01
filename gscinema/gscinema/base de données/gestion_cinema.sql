
DROP DATABASE IF EXISTS gestion_cinema;

CREATE DATABASE IF NOT EXISTS gestion_cinema;

USE gestion_cinema;

CREATE TABLE reservation (
    idFilm INT(4) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    civilite VARCHAR(1),
    photo VARCHAR(100),
    idSalle INT(4),
    FOREIGN KEY (idSalle) REFERENCES salle(idSalle)
);

CREATE TABLE salle (
    idSalle INT(4) AUTO_INCREMENT PRIMARY KEY,
    nomSalle VARCHAR(50),
    locall VARCHAR(50)
);

CREATE TABLE utilisateur (
    iduser INT(4) AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50),
    email VARCHAR(255),
    role VARCHAR(50),
    etat INT(1),
    pwd VARCHAR(255)
);

INSERT INTO salle (nomSalle, locall)
VALUES
    ('Pathé', 'Ben Arous azur city'),
    ('Cinévog', 'Rue Said Abou Baker'),
    ('Le colisée', 'Avenu Habib Bourguiba'),
    ('Cinemadart', 'Avenu Habib Bourguiba'),
    ('Ciné Jamil', 'Ariana'),
    ('Lagora', 'Houmet-souk Djerba'),
    ('Parnasse', 'Avenu Habib Bourguiba');

INSERT INTO utilisateur (login, email, role, etat, pwd)
VALUES
    ('admin', 'admin@gmail.com', 'ADMIN', 1, MD5('123')),
    ('user1', 'user1@gmail.com', 'VISITEUR', 0, MD5('123')),
    ('user2', 'user2@gmail.com', 'VISITEUR', 1, MD5('123'));

INSERT INTO reservation (nom, prenom, civilite, photo, idSalle)
VALUES
    ('SAADAOUI', 'MOHAMMED', 'M', 'Chrysantheme.jpg', 1),
    ('CHAABI', 'OMAR', 'M', 'Desert.jpg', 2),
    ('SALIM', 'RACHIDA', 'F', 'Hortensias.jpg', 3),
    ('FAOUZI', 'NABILA', 'F', 'Meduses.jpg', 1),
    ('ETTAOUSSI', 'KAMAL', 'M', 'Penguins.jpg', 2),
    ('EZZAKI', 'ABDELKARIM', 'M', 'Tulipes.jpg', 3),
    ('SAADAOUI', 'MOHAMMED', 'M', 'Chrysantheme.jpg', 1),
    ('CHAABI', 'OMAR', 'M', 'Desert.jpg', 2),
    ('SALIM', 'RACHIDA', 'F', 'Hortensias.jpg', 3),
    ('FAOUZI', 'NABILA', 'F', 'Meduses.jpg', 1),
    ('ETTAOUSSI', 'KAMAL', 'M', 'Penguins.jpg', 2),
    ('EZZAKI', 'ABDELKARIM', 'M', 'Tulipes.jpg', 3),
    ('SAADAOUI', 'MOHAMMED', 'M', 'Chrysantheme.jpg', 1),
    ('CHAABI', 'OMAR', 'M', 'Desert.jpg', 2),
    ('SALIM', 'RACHIDA', 'F', 'Hortensias.jpg', 3),
    ('FAOUZI', 'NABILA', 'F', 'Meduses.jpg', 1),
    ('ETTAOUSSI', 'KAMAL', 'M', 'Penguins.jpg', 2),
    ('EZZAKI', 'ABDELKARIM', 'M', 'Tulipes.jpg', 3);

SELECT * FROM salle;

SELECT * FROM reservation;

SELECT * FROM utilisateur;
