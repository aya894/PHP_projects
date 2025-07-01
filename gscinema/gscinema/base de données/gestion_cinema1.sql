drop database if exists gestion_stag;
create database if not exists gestion_cinema;
use gestion_cinema;

create table reservation(   --table stagiaire
    idFilm int(4) auto_increment primary key,  --idStagiaire
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    photo varchar(100),  --photo du film
    idSalle int(4)  --idFiliere
);

create table salle(    --filiere
    idSalle int(4) auto_increment primary key,  --idFiliere
    nomSalle varchar(50),  --nomFiliere
    locall varchar(50)   --niveau
);

create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
);

Alter table reservation add constraint 
    foreign key(idSalle) references filiere(idSalle);

INSERT INTO salle(nomSalle,locall) VALUES
	('Pathé','Ben Arous azur city'),
	('Cinévog','Rue Said Abou Baker'),
	('Le colisée','Avenu Habib Bourguiba'),
	('Cinemadart','Avenu Habib Bourguiba'),
	('Ciné Jamil','Ariana'),	
    ('Lagora','Houmet-souk Djerba'),
    ('Parnasse','Avenu Habib Bourguiba');
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	

INSERT INTO reservation(nom,prenom,civilite,photo,idSalle) VALUES
    ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),
    
     ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),

    ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3);
  

select * from salle;
select * from reservation;
select * from utilisateur;

