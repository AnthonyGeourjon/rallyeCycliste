<?php
session_start ();

require_once "VerifConnexion.php";

// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}

verifPage ();

/* Redirection vers les pages associées */

if (isset ( $_POST ['inscription'] )) {
	header ( "Location: Inscription.php" );
}
if (isset ( $_POST ['preInscription'] )) {
	header ( "Location: PreInscription.php" );
}
if (isset ( $_POST ['Validation'] )) {
	header ( "Location: Validation.php" );
}
if (isset ( $_POST ['Statistique'] )) {
	header ( "Location: Statistique.php" );
}
if (isset ( $_POST ['Randonnee'] )) {
	header ( "Location: Randonnee.php" );
}


echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"
	content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="Contacts.css" />
<title>Menu principal</title>
</head>
<body>
	<h1>Menu principal</h1>
	<p>
            <?php
												
												echo "
                    <form method='post' action='Menu.php'>
                        <p><input type='submit' name='inscription' value='Gestion inscription'/></p> 
						<p><input type='submit' name='preInscription' value='Gestion preinscription'/></p> 
						<p><input type='submit' name='validation' value='Validation'/></p>
						<p><input type='submit' name='statistique' value='Statistique'/></p> 
						<p><input type='submit' name='randonnee' value='Randonnee'/></p> 		
                    </form>
                   ";
												?>
			<?php /* print_r($_POST); print_r($_SESSION)*/ ?>
	</p>
</body>
</html>