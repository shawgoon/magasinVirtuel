<?php include('/headerhtml.php'); ?>

<?php if (!is_admin()) {die('<h4>Vous n\'avez pas les droits pour accéder à cette page</h4>');}; ?>

<a href="formInscription/table.php"><span class="glyphicon glyphicon-user"></span> Gestion des utilisateurs</a>
<a href="formArticle/articletable.php"><span class="glyphicon glyphicon-tags"></span> Gestion des articles</a>
<a href="facturePanier/table.php"><span class="glyphicon glyphicon-usd"></span> Gestion des facturations</a>
<a href="creationPanier/catalogue.php"><span class="glyphicon glyphicon-shopping-cart"></span> Retour au catalogue</a>
<a href="panier/index.php">panier provisoir</a>

<?php include('/footerhtml.php'); ?>
