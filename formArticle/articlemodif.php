<?php include('../headerhtml.php'); ?>
<?php

if (!is_admin()) {die();};

// requête de modification d'un article
$sql = "UPDATE article SET nom = '".$_POST['nom']."',description = '".$_POST['description']."',prix = '".$_POST['prix']."',image = '""' WHERE id = ".$_POST['articleId'];

$updateSuccess = $instance->exec($sql);

if ($updateSuccess) {
  $message = "Article modifié !>";
} else {
  $message = "L'article n'a pas été modifié !";
}
 ?>


 <header>
   <h4><?php echo $message; ?></h4>
 </header>
 <hr>
 <section>
   <a href="articletable.php">Retour à la liste des articles</a>
 </section>

 <?php include('../footerhtml.php'); ?>
