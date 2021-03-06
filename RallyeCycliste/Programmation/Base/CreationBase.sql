CREATE TABLE UTILISATEUR (
idUtilisateur int(11) NOT NULL AUTO_INCREMENT,
mail VARCHAR (50) UNIQUE,
motDePasse VARCHAR(20),
PRIMARY KEY (idUtilisateur) 
) ENGINE=InnoDB;

/* 

- Les comptes admin et bénevole seront différenciés des autres utilisateurs par leurs logins "admin", "benevole". 

*/

CREATE TABLE PARCOURS (
idParcours int(11) NOT NULL AUTO_INCREMENT,
distance INT,
type VARCHAR(5),
PRIMARY KEY (idParcours) ) ENGINE=InnoDB;

/* 

- La base ne teste pas la cohérence des parcours saisies, on le fera dans le code PHP.

*/

/* Dénormalisation du schéma entité association afin de créer moins de table et de pouvoir ainsi réduire le nombre de jointure*/


CREATE TABLE INSCRIPTION (
idInscription int(11) NOT NULL AUTO_INCREMENT,
estArrive BOOLEAN NOT NULL,
nomRandonneur VARCHAR(30),
prenomRandonneur VARCHAR(30),
sexe CHAR(1),
dateNaissance DATE,
age INT,
federation VARCHAR (6),
clubOuVille VARCHAR (40),
departement INT,
posteDInscription INT,
idParcours int(11) NOT NULL,
idUtilisateur int(11) NOT NULL,
PRIMARY KEY (idInscription)
) ENGINE=InnoDB;

/* 

- Le champ "posteDInscription" correspond à l'identifiant du poste d'inscription ou à NULL si il s'agit d'une préinscription
- Le champ "idinscriveur" fait réference à l'utilisateur qui a enregistré cette inscription (bénévole ou randonneur web) 

*/

ALTER TABLE INSCRIPTION
  ADD CONSTRAINT inscription_1 FOREIGN KEY (idParcours) REFERENCES PARCOURS (idParcours),
  ADD CONSTRAINT inscription_2 FOREIGN KEY (idUtilisateur) REFERENCES UTILISATEUR (idUtilisateur);
  
/* Table pour les comparaisons entre année */
﻿

CREATE TABLE IF NOT EXISTS `randonnee` (
  `annee` int(11) NOT NULL,
  `randoSerialise` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
ALTER TABLE `randonnee`
 ADD PRIMARY KEY (`annee`);