<?php include('../headerhtml.php'); ?>
<?php
if (!is_admin()) {die();};

$uploadDir = 'C:\wamp64\www\magasin\uploads/';
$uploadFile = $uploadDir . basename($_FILES['image']['name']);
$imgPath = 'http://localhost/magasin/uploads/' . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
  var_dump('success');
} else {
  var_dump('fail');
}

// requête de modification d'un article
$sql = "UPDATE article SET nom = '".$_POST['nom']."',description = '".$_POST['description']."',prix = '".$_POST['prix']."',image = '".$imgPath."' WHERE id = ".$_POST['articleId'];

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
