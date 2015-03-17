function chargerDerniersInscrits(){
	$.getJSON("DerniersInscrits.php",
			function (liste){
				for (i in liste) {
					addLine(liste[i]);
				}
			}
	);
}

function addLine(inscrit){
	var ligne =  aCloner.clone(true);
	var tds = ligne.children();
	tds.eq(0).text(inscrit.nomRandonneur);
	tds.eq(1).text(inscrit.prenomRandonneur);
	tds.eq(2).text(inscrit.sexe);
	tds.eq(3).text(inscrit.dateNaissance);
	tds.eq(4).text(inscrit.clubOuVille);
	tds.eq(5).text(inscrit.federation);
	tds.eq(6).text(inscrit.departement);
	tds.eq(7).text(inscrit.parcours);
	
	nouv.appendTo(tbody);
	
}

var aCloner;
var tbody;

$(document).ready(function (){
	aCloner = $('table > thead > tr:last-child');
	tbody = $('table > tbody');
	
	chargerDerniersInscrits();
});