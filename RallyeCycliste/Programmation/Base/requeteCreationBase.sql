/* --- SCRIPT CR�ATION DES TABLES DU PROJET 2E ANN�E ---
   - Auteur : Anthony Geourjon
   - Date : 02/02/2015
   - Avancement : Termin�

/* 

- Le champ "posteDInscription" correspond � l'identifiant du poste d'inscription ou � NULL si il s'agit d'une pr�inscription
- Le champ "idinscriveur" fait r�ference � l'utilisateur qui a enregistr� cette inscription (b�n�vole ou randonneur web) 

*/

DROP TABLE IF EXISTS UTILISATEUR ;
CREATE TABLE UTILISATEUR (
idUtilisateur INT AUTO_INCREMENT NOT NULL,
login VARCHAR(30) UNIQUE,
motDePasse VARCHAR(30),
PRIMARY KEY (idUtilisateur) 
) ENGINE=InnoDB;

/* 

- Les comptes admin et b�nevole seront diff�renci�s des autres utilisateurs par leurs logins "admin", "benevole". 

*/

DROP TABLE IF EXISTS PARCOURS ;
CREATE TABLE PARCOURS (
idParcours INT  AUTO_INCREMENT NOT NULL,
distance INT,
type VARCHAR(5),
PRIMARY KEY (idParcours) ) ENGINE=InnoDB;

/* 

- La base ne teste pas la coh�rence des parcours saisies, on le fera dans le code PHP.

*/

/* D�normalisation du sch�ma entit� association afin de cr�er moins de table et de pouvoir ainsi r�duire le nombre de jointure*/

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