<?php include('../headerhtml.php'); ?>
<?php

if (!is_admin()) {die();};

$message = "";

// recupération de la liste d'article
$sql = "SELECT * FROM article";
$listArticle = $instance->query($sql)->fetchAll();
 ?>

    <header>
      <h2>Liste de Articles</h2>
    </header>
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Prix</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($listArticle); $i++) { ?>
        <tr>
          <td><?php echo $listArticle[$i]['id'] ?></td>
          <td><?php echo $listArticle[$i]['nom'] ?></td>
          <td><?php echo $listArticle[$i]['description'] ?></td>
          <td><?php echo $listArticle[$i]['prix']." €" ?></td>
          <td><?php echo $listArticle[$i]['image'] ?></td>
          <td>
            <form class="" action="articleformulaire.php" method="post">
              <button class="modif" type="submit" name="articleUpdate" value="">
                <input type="hidden" name="articleId"  value="<?php echo $listArticle[$i]['id'] ?>">
                <i class="glyphicon glyphicon-pencil"></i>
              </button>
            </form>
            <form class="" action="delarticle.php" method="post">
              <button class="modif" type="submit" name="articleDelete" value="">
                <input type="hidden" name="articleId" value="<?php echo $listArticle[$i]['id'] ?>">
                <i class="glyphicon glyphicon-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

      <a class="ajout" href="articleformulaire.php">Ajouter un article</a>
      <a href="../indexAdmin">Retour index administrateur</a>

  <?php include('../footerhtml.php'); ?>
