<?php include('../headerhtml.php'); ?>
<?php

if (!is_admin()) {die();};

// requête d'ajout d'article

  $sql = "INSERT INTO article (nom, description, prix)
  VALUES ('".$_POST['nom']."','".$_POST['description']."','".$_POST['prix']."')";

  $createSuccess = $instance->exec($sql);

  if ($createSuccess) {
    $message = "<h3>Article ajouté !</h3>";
  } else {
    $message = "<h3>L'article n'a pas été ajouté !</h3>";
  }
 ?>

<header>
  <h4><?php echo $message ?></h4>
</header>
<hr>
<section>
  <a href="articletable.php">Retour à la liste des articles</a>
  <a href="articleformulaire.php">Ajouter un autre article</a>
</section>

  <?php include('../footerhtml.php') ?>
