<?php
session_start ();

// TODO Terminer la mise en page

require_once "VerifConnexion.php";

// Autochargement des classes
function __autoload($class) {
	require_once "../Classes/$class.php";
}

verifConnexion ();

echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"
	content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="Contacts.css" />
<title>Page de connexion</title>
</head>
<body>
	<h1>Page de connexion</h1>
	<p>
            <?php
												
												echo "
                    <form method='post' action='Connexion.php'>
                        <p><label>Saisissez votre login: </label><input type='text' name='mail'  /></p>
                        <p><label>Saisissez votre mot de passe: </label><input type='password' name='motDePasse' /></p>
                        <p><input type='submit' value='Valider'/></p> 
                    </form>
                   ";
												?>
			<?php /* print_r($_POST); print_r($_SESSION)*/ ?>
	</p>
</body>
</html>

