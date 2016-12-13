<?php include('../headerhtml.php'); ?>
<?php

if (!is_admin()) {die();};

 $title = "Ajout d'un article";
 $action = "ajoutarticle.php";
 $submit = "<p><input  class='button' type='submit' value='Ajouter'></p>";
 $hidden = "";
 $article = [
   "nom" => "",
   "description" => "",
   "prix" => "",
  //  "image" => ""
 ];

 if (isset($_POST['articleUpdate'])) {

   $title = "Modification d'un article";
   $action = "articlemodif.php";
   $submit = "<p><input class='button' type='submit' value='Modifier'></p>";

   $sql = "SELECT * FROM article WHERE id = " .$_POST['articleId'];
   $article = $instance->query($sql)->fetch();
   $hidden = "<input type='hidden' name='articleId' value='".$article['id']."'>";
 }
?>
    <header>
      <h2><?php echo $title ?></h2>
    </header>
    <div class="form">
      <form id="ajout" enctype="multipart/form-data" action="<?php echo $action ?>" method="post">
        <p class="champs"><label for="">Nom</label><br>
        <input id="nom" type="text" name="nom" placeholder="nom de l'article" value="<?php echo $article['nom'] ?>"></p>
        <p class="champs"><label for="">Description</label><br>
        <input id="description" type="text" name="description" placeholder="description de l'article" value="<?php echo $article['description'] ?>"></p>
        <p class="champs"><label for="">Prix</label><br>
        <input id="prix" type="number" name="prix" placeholder="10,00 " value="<?php echo $article['prix'] ?>"></p>
        <p class="champs"><label for="">Image de l'article</label><br>
        <input id="image" type="file" name="image" value=""></p>
        <?php if ($hidden !== "") { echo $hidden; } ?>
        <?php echo $submit ?>
      </form>
    </div>
    <hr>
    <section>
      <a href="articletable.php">Retour à la liste des articles</a>
    </section>

  <?php include('../footerhtml.php'); ?>
