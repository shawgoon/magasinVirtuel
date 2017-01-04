<?php include('../headerhtml.php') ?>
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

// création de la requête

$sql = "SELECT * FROM utilisateur";
$users = $instance->query($sql)->fetchAll();
?>

    <!-- si on veut créer un utilisateur -->
    <?php
    if (isset($_POST['userCreate'])){
      $nom = ($_POST['nom']);
      $prenom = ($_POST['prenom']);
      $email = ($_POST['email']);
      $password = ($_POST['password']);
      $rue = ($_POST['rue']);
      $ville = ($_POST['ville']);
      $codepostal = ($_POST['codepostal']);
      $groupe_id = ($_POST['groupe_id']);
      $sql = "INSERT INTO utilisateur (nom, prenom, email, password, rue, ville, codepostal, groupe_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $createSuccess = $instance->prepare($sql);
      $createSuccess -> execute(array($nom, $prenom, $email, $password, $rue, $ville, $codepostal, $groupe_id));
   ?>
   <!-- confirmation de l'inscription -->
   <?php
   if($createSuccess){
     ?><h1>Salut <?php echo $_POST['prenom'] ?></h1>
     <p class="inscription">ton inscription est bien prise en compte</p>
     <p class="inscription">Tu peux maintenant te connecter avec tes identifiants</p>
     <p class="inscription"><a href="index.php">retour au formulaire</a></p>
     <?php
      }
   }?>

   <!-- sinon si on veut modifier un utilisateur on envoi un formulaire de modification -->
   <?php
    if (isset($_POST['userUpdateForm'])) {
     $sql = "UPDATE utilisateur
     SET nom = '".$_POST['nom']."',
         prenom = '".$_POST['prenom']."',
         email = '".$_POST['email']."',
         password = '".$_POST['password']."',
         rue = '".$_POST['rue']."',
         ville = '".$_POST['ville']."',
         codepostal = '".$_POST['codepostal']."',
         groupe_id = '".$_POST['groupe_id']."'
     WHERE id=" .$_POST['userId'];
     $updateSuccess = $instance->exec($sql);
     if ($updateSuccess) {
     ?><h1><?php echo $_POST['prenom'] ?></h1>
   <p class="inscription">Ton compte a été modifié</p>
  <p class="inscription"><a href="table.php">retour au tableau</a></p>  <?php
     }
   }
   ?>


  <?php include('../footerhtml.php'); ?>
