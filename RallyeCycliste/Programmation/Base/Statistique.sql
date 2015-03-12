/* Liste des requètes nécessaire à l'élaboration des statistique

Rappel des statistique à fournir (détail sur l'excel RallyeCycliste/Divers/ancienSystemeMaitre.xls)

-Statistique général:

	-Répartition VTT/Route
	-Non licencié, féminine, -18 ans, FFCT, UFOLEP, FSGT, FFC

-Pour route et VTT:
 
	-Féminine, non-licencié, licencié Saint-Péray, non licencié Saint-Péray
	-Répartition sur les parcours
	-Club le plus nombreux
x	-2 clubs les plus nombreux d'Ardèche 
x	-2 clubs les plus nombreux de Drôme 
	-Le plus éloigné (euh comment on fais ça?)
	-Le plus de féminine
	-La plus jeune 
	-Le plus jeune  
	
	IL MANQUE LES REQUETES TYPE "LES 2 CLUBS..", JE N4AI FAIT QUE LES MAX

*/

/* Nombre participants route */
SELECT COUNT(*) AS nombreParticipantsTotal FROM inscription

/* Nombre participants VTT */
SELECT COUNT(*) AS nombreParticipantsVTT FROM inscription JOIN parcours USING(idParcours) WHERE type='VTT' 

/* Nombre participants route */
SELECT COUNT(*) AS nombreParticipantsRoute FROM inscription JOIN parcours USING(idParcours) WHERE type='ROUTE' 

/* Nombre féminine total : */
SELECT COUNT(*) AS nombreFeminine FROM `inscription` WHERE sexe='F' ;

/* Nombre non-licencié total*/
SELECT COUNT(*) AS nombreNonlicencie FROM `inscription` WHERE federation='NL' ;

/* Nombre -18 ans total*/
//TODO

/* Nombre FFCT total*/
SELECT COUNT(*) AS nombreLicenceFFCT FROM inscription WHERE federation='FFCT' 

/* Nombre UFOLEP total*/
SELECT COUNT(*) AS nombreLicenceUFOLEP FROM inscription WHERE federation='UFOLEP' 

/* Nombre FSGT total*/
SELECT COUNT(*) AS nombreLicenceFSGT FROM inscription WHERE federation='FSGT' 

/* Nombre FFC total*/
SELECT COUNT(*) AS nombreLicenceFFC FROM inscription WHERE federation='FFC' 

/* --------------------------------------------------------------------------------------- */

/* Nombre non-licencié VTT */
SELECT COUNT(*) AS nombreNonlicencieVTT FROM inscription JOIN parcours USING(idParcours) WHERE federation='NL' AND type='VTT' 

/* Nombre non-licencié route */
SELECT COUNT(*) AS nombreNonlicencieRoute FROM inscription JOIN parcours USING(idParcours) WHERE federation='NL' AND type='ROUTE' 

/* Nombre féminine VTT */
SELECT COUNT(*) AS nombreFeminineVTT FROM inscription JOIN parcours USING(idParcours) WHERE sexe='F' AND type='VTT' 

/* Nombre féminine route */
SELECT COUNT(*) AS nombreFeminineRoute FROM inscription JOIN parcours USING(idParcours) WHERE sexe='F' AND type='ROUTE' 

/* Nombre non licencié CCSTPeray VTT*/
SELECT COUNT(*) AS nombreNonlicencieVTTSTPeray FROM inscription JOIN parcours USING(idParcours) WHERE federation='NL' AND type='VTT' AND clubOuVille='ZSTPERAY';

/* Nombre non licencié CCSTPeray Route*/
SELECT COUNT(*) AS nombreNonlicencieRouteSTPeray FROM inscription JOIN parcours USING(idParcours) WHERE federation='NL' AND type='ROUTE' AND clubOuVille='ZSTPERAY';

/* Nombre licencié CCSTPeray VTT*/
SELECT COUNT(*) AS nombreNonlicencieRouteSTPeray FROM inscription JOIN parcours USING(idParcours) WHERE type='VTT' AND clubOuVille='CCSTPERAY';

/* Nombre licencié CCSTPeray Route*/
SELECT COUNT(*) AS nombreNonlicencieRouteSTPeray FROM inscription JOIN parcours USING(idParcours) WHERE type='ROUTE' AND clubOuVille='CCSTPERAY';

/* Répartition VTT */
SELECT COUNT(*) AS nombreParticipant distance FROM inscription JOIN parcours USING(idParcours) WHERE type='VTT' GROUP BY distance

/* Répartition Route */
SELECT COUNT(*) AS nombreParticipant, distance FROM inscription JOIN parcours USING(idParcours) WHERE type='ROUTE' GROUP BY distance

/* Club le plus nombreux VTT */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL'
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' 
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux route */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL'
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' 
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux VTT ardèche*/
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL' AND departement=7
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' AND departement=7
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux VTT drome*/
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL' AND departement=26
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' AND departement=26
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux route ardèche*/
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL' AND departement=7
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' AND departement=7
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux route drome*/
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL' AND departement=26
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' AND departement=26
         GROUP BY clubOuVille) 
    I
);

/*Club ou il y a le plus de fémine route */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL' AND sexe='F'
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' AND sexe='F'
         GROUP BY clubOuVille) 
    I
);

/*Club ou il y a le plus de fémine VTT */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL' AND sexe='F'
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' AND sexe='F'
         GROUP BY clubOuVille) 
    I
);


/*Plus jeune féminine VTT */
SELECT `nomRandonneur`, `prenomRandonneur`
FROM `inscription` 
WHERE dateNaissance = (
    SELECT MAX(dateNaissance) 
    FROM `inscription` JOIN parcours USING (idParcours) 
    WHERE sexe='F' AND type="VTT"
);

/*Plus jeune féminine ROUTE */
SELECT `nomRandonneur`, `prenomRandonneur`
FROM `inscription` 
WHERE dateNaissance = (
    SELECT MAX(dateNaissance) 
    FROM `inscription` JOIN parcours USING (idParcours) 
    WHERE sexe='F' AND type="ROUTE"
);

/*Plus jeune homme VTT */
SELECT `nomRandonneur`, `prenomRandonneur`
FROM `inscription` 
WHERE dateNaissance = (
    SELECT MAX(dateNaissance) 
    FROM `inscription` JOIN parcours USING (idParcours) 
    WHERE sexe='H' AND type="VTT"
);

/*Plus jeune homme ROUTE */
SELECT `nomRandonneur`, `prenomRandonneur`
FROM `inscription` 
WHERE dateNaissance = (
    SELECT MAX(dateNaissance) 
    FROM `inscription` JOIN parcours USING (idParcours) 
    WHERE sexe='H' AND type="ROUTE"
);





/* Club le plus nombreux d'ardeche VTT */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL' AND departement=7
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' AND departement=7
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux d'ardeche ROUTE */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL' AND departement=7
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' AND departement=7
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux de drome VTT */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='VTT' AND federation<>'NL' AND departement=26
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='VTT' AND federation<>'NL' AND departement=26
         GROUP BY clubOuVille) 
    I
);

/* Club le plus nombreux de drome ROUTE */
SELECT clubOuVille, COUNT(*) as nombreMembre
FROM inscription join parcours using(idParcours)
WHERE type='ROUTE' AND federation<>'NL' AND departement=26
GROUP BY clubOuVille HAVING count(*)=
(
    SELECT MAX(nbMembre) 
    FROM
    	(SELECT COUNT(*) as nbMembre 
         FROM inscription join parcours using(idParcours) 
         WHERE type='ROUTE' AND federation<>'NL' AND departement=26
         GROUP BY clubOuVille) 
    I
);
