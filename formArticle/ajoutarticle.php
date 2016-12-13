<?php include('../headerhtml.php'); ?>
<?php
if (!is_admin()) {die();};

// appel des variable d'ajout d'image

$uploadDir = 'C:\wamp64\www\magasin\uploads/';
$uploadFile = $uploadDir.basename($_FILES['image']['name']);
$imgPath ='http://localhost/magasin/uploads/' . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
  var_dump('success');
} else {
  var_dump('fail');
}

// requête d'ajout d'article

  $query = $instance->prepare("INSERT INTO article (nom, description, prix, image)
  VALUES (:nom, :description, :prix, :image)");

  $createSuccess = $query->execute(array(
    "nom" => $_POST['nom'],
    "description" => $_POST['description'],
    "prix" => $_POST['prix'],
    "image" => $imgPath
  ));

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
