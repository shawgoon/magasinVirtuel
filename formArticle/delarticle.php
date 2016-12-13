<?php include('../headerhtml.php'); ?>
<?php

if (!is_admin()) {die();};

// requête de suppression d'un article
$sql = "DELETE FROM article WHERE id = ".$_POST['articleId'];

$deleteSuccess = $instance->exec($sql);

if ($deleteSuccess) {
  $message = "<h3>Article supprimé !</h3>";
} else {
  $message = "<h3>L'article n'a pas été supprimé !</h3>";
}
 ?>


 <header>
   <h4><?php echo $message ?></h4>
 </header>
 <hr>
 <section>
   <a href="articletable.php">Retour à la liste des articles</a>
 </section>

 <?php include('../footerhtml.php'); ?>
