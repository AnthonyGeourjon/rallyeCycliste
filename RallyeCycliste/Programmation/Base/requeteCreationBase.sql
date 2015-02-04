/* --- SCRIPT CRÉATION DES TABLES DU PROJET 2E ANNÉE ---
   - Auteur : Anthony Geourjon
   - Date : 02/02/2015
   - Avancement : Terminé

/* 

- Le champ "posteDInscription" correspond à l'identifiant du poste d'inscription ou à NULL si il s'agit d'une préinscription
- Le champ "idinscriveur" fait réference à l'utilisateur qui a enregistré cette inscription (bénévole ou randonneur web) 

*/

DROP TABLE IF EXISTS UTILISATEUR ;
CREATE TABLE UTILISATEUR (
idUtilisateur INT AUTO_INCREMENT NOT NULL,
mail VARCHAR (50),
motDePasse VARCHAR(20),
PRIMARY KEY (idUtilisateur) 
) ENGINE=InnoDB;

/* 

- Les comptes admin et bénevole seront différenciés des autres utilisateurs par leurs logins "admin", "benevole". 

*/

DROP TABLE IF EXISTS PARCOURS ;
CREATE TABLE PARCOURS (
idParcours INT  AUTO_INCREMENT NOT NULL,
distance INT,
type VARCHAR(5),
PRIMARY KEY (idParcours) ) ENGINE=InnoDB;

/* 

- La base ne teste pas la cohérence des parcours saisies, on le fera dans le code PHP.

*/

/* Dénormalisation du schéma entité association afin de créer moins de table et de pouvoir ainsi réduire le nombre de jointure*/

DROP TABLE IF EXISTS INSCRIPTION ;
CREATE TABLE INSCRIPTION (

idInscription INT AUTO_INCREMENT NOT NULL,
nomRandonneur VARCHAR(30),
prenomRandonneur VARCHAR(30),
sexe VARCHAR(1),
dateNaissance DATE,
age INT,
federation VARCHAR (6),
clubOuVille VARCHAR (40),
departement INT,
posteDInscription INT,
idParcours INT,
idInscriveur INT,
PRIMARY KEY (idInscription), 
FOREIGN KEY (idParcours) REFERENCES PARCOURS(idParcours),
FOREIGN KEY (idInscriveur) REFERENCES UTILISATEUR(idUtilisateur)
) ENGINE=InnoDB;