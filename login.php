<?php include('/headerhtml.php');
$connected = false; ?>

<?php if (isset($_POST['email']) && isset($_POST['password'])) {

  $sql = "SELECT *
  FROM utilisateur
  WHERE email = '".$_POST['email']."'AND password = '".$_POST['password']."'";
  $user = $instance->query($sql)->fetch();

  if ($user) {
    $_SESSION['user'] = array(
      "userName" => $user['prenom'],
      "userId" => $user['id'],
      "groupe" => $user['groupe_id']
    );
    $connected = true;
    $message = "Connecté !";
  } else {
    $message = "identifiants incorrect !";
  }
}?>

<div class="">
<?php if (isset($message)) { ?>
  <p><?php echo $message ?></p>
  <?php if ($connected) { ?>
    <?php header('Location: http://localhost/j1/magasinVirtuel/creationPanier/catalogue.php');
    exit();?>
  <?php } ?>
<?php } ?>
<?php if (!$connected) { ?>
  <?php
     header('Location: http://localhost/j1/magasinVirtuel/formInscription/index.php');
    exit();
  ?>
<?php } ?>
</div>

<?php include('/footerhtml.php'); ?>
