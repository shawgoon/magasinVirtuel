<?php include('../headerhtml.php'); ?>
<?php
$message = "";
// validation du panier
if (!empty($_POST)) {
  if (isset($_POST['validPanier'])) {
    $sql = "UPDATE panier
    SET statut = 'done'
    WHERE panier.utilisateur_id = ".get_current_user_id()." AND panier.id = ".$_POST['cartId'];
    $message = "<h3>Votre commande est bien prise en compte</h3>
    <h4>Elle vous sera expédiée dans les plus bref délais</h4>";
  } else if (isset($_POST['delPanier'])) {
    $sql = "UPDATE panier
    SET statut = 'cancel'
    WHERE panier.utilisateur_id = ".get_current_user_id()." AND panier.id = ".$_POST['cartId'];
    $message = "<h3>panier annulé !</h3>";
  }
  $instance->exec($sql);
}
?>
<?php echo $message ?>


<a href="catalogue.php">Retour à notre catalogue</a>

<?php include('../footerhtml.php'); ?>

<!-- delete un article au panier -->
<!-- DELETE FROM `panier` WHERE `panier`.`id` = 9 AND `panier`.`utilisateur_id` = 7 AND `panier`.`article_id` = 7 -->
