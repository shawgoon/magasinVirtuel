<?php include('../headerhtml.php'); ?>
<?php

$utilisateur = array(
  "nom" => "",
  "prenom" => "",
  "email" => "",
  "password" => "",
  "rue" => "",
  "ville" => "",
  "codepostal" => "",
  "groupe_id" => 1
);

?>

<!-- si on veut effacer un utilisateur -->
<?php if (isset($_POST['userDelete'])) {
  $sql = "DELETE FROM utilisateur WHERE id =".$_POST['userId'];
  $deleteSuccess = $instance->exec($sql);

// <!-- confirmation de suppression -->
 if($deleteSuccess) {
  ?> <h1>Au Revoir</h1>
  <p class="inscription">Ton compte a été supprimé</p>
  <p class="inscription"><a href="table.php">retour au tableau</a></p>
  <?php
  }
}
?>

<!-- sinon si on veut modifier un utilisateur (au click sur un bouton modifié)-->
<?php
 if (isset($_POST['userUpdate'])) {
  $sql = "SELECT * FROM utilisateur WHERE id =".$_POST['userId'];
  $utilisateur = $instance->query($sql)->fetch();
}
?>
  <!-- création de la requête utilisateur -->
  <?php
  $sql = "SELECT * FROM utilisateur";
  $users = $instance->query($sql)->fetchAll();
  ?>


    <!-- formulaire d'inscription et de modification -->

    <div class="form">
        <?php
        if (isset($_POST['userUpdate'])) {
          ?><h1>Modification d'un utilisateur</h1>

          <p><input type="text" disabled="disabled" value="<?php echo $utilisateur['id']; ?>"></p>

            <?php
          } else {
            ?><h1>Inscription</h1><?php
          } ?>
      <form id="signup" action="cible.php" method="post">
        <p><label for="">Nom</label><br>
        <input id="nom" type="text" name="nom" placeholder="nom" value="<?php echo $utilisateur['nom']; ?>"></p>
        <p><label for="">Prénom</label><br>
        <input id="prenom" type="text" name="prenom" placeholder="prenom" value="<?php echo $utilisateur['prenom']; ?>"></p>
        <p><label for="">E-mail</label><br>
        <input id="mail" type="text" name="email" placeholder="email@email" value="<?php echo $utilisateur['email']; ?>"></p>
        <p><label for="">Mot de Passe</label><br>
        <input id="pass" type="password" name="password" placeholder="******" value="<?php echo $utilisateur['password']; ?>"></p>
        <p><label for="">Adresse</label><br>
        <input id="adresse" type="text" name="rue" placeholder="rue du champs de Mars" value="<?php echo $utilisateur['rue']; ?>"></p>
        <p><label for="">Ville</label><br>
        <input id="ville" type="text" name="ville" placeholder="Paris" value="<?php echo $utilisateur['ville']; ?>"></p>
        <p><label for="">Code Postal</label><br>
        <input id="cp" type="text" name="codepostal" placeholder="75000" value="<?php echo $utilisateur['codepostal']; ?>"></p>
        <p>
          <?php
          if (isset($_POST['userUpdate'])) { ?>
            <p><label for="">Droits de l'utilisateur</label><br>
              <select class="input" name="groupe_id" value="">
                <option value="">-- Selectionnez --</option>
                <option value="1">Client</option>
                <option value="2">Administrateur</option>
              </select></p>
              <input type="hidden" name="userId" value="<?php echo $utilisateur['id'] ?>">
            <input class="button" type="submit" name="userUpdateForm" value="modifier">
          <?php } else { ?>
            <input type="hidden" name="userCreate" value="true">
            <input class="button" type="submit"value="s'inscrire">
          <?php
          }
           ?>
        </p>
      </form>
    </div>

      <!-- formulaire de connexion -->



    <div class="form">
      <h1>Login</h1>
        <form id="login" action="../login.php" method="post">
          <p><label for="">Votre email de connection</label>
          <input id="maillog" type="text" name="email" placeholder="email@email"></p>
          <p><label for="">Votre mot de passe</label>
          <input id="passlog" type="password" name="password" placeholder="*****"></p>

          <?php if (isset($_POST['email'])) { ?>
          <p><input type="hidden" name="userId" value="<?php echo $user['id'] ?>">
          <?php  } ?>
          <input class="button" type="submit" name="userName" value="connexion"></p>
        </form>
    </div>

  <?php include('../footerhtml.php'); ?>
