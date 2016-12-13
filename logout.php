<?php
include('/headerhtml.php');

// On supprime la session, ce qui va déconnecter l'utilisateur
unset($_SESSION['user']);
 ?>
<h4>Vous êtes déconnecté !</h4>
<a href="formInscription/index.php">Vous connectez</a>

<?php include('/footerhtml.php'); ?>
