<?php include('../headerhtml.php');
$message = "";

$sql = "SELECT panier.id, panier.quantite, article.nom, article.prix
FROM panier
INNER JOIN article ON panier.article_id = article.id
WHERE utilisateur_id = ".get_current_user_id()
." AND panier.statut = 'pending'";

$articles = $instance->query($sql)->fetchAll();
$totalHT = 0;
 ?>

<div class="validPanier">
    <h3>mon panier</h3>
    <h4>Commande n° <?php  ?></h4>


    <!-- si le panier n'est pas vide, on liste les articles
  et on fait les comptes-->
    <?php if (!empty($articles)) { ?>
    <table>
      <thead>
        <tr>
          <th>Id Article</th>
          <th>Nom de l'article</th>
          <th>Quantité</th>
          <th>Prix Unitaire</th>
          <th>Remise</th>
          <th>Total HT</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($articles as $article) {
          $totalArticle = $article['prix'] * $article['quantite'];
          $totalHT += $totalArticle;
          ?>
          <tr>
            <td><?php echo $article['id'] ?></td>
            <td><?php echo $article['nom'] ?></td>
            <td><?php echo $article['quantite'] ?></td>
            <td><?php echo $article['prix'] ?></td>
            <td><?php  ?></td>
            <td><?php echo $totalArticle ?></td>
          </tr>
      <?php  } ?>
        <tr>
          <th colspan="5" class="totaux">Total HT</th>
          <td><?php echo $totalHT ?></td>
        </tr>
        <tr>
          <th colspan="5" class="totaux">Total TVA</th>
          <td><?php echo $totalHT*0.2 ?></td>
        </tr>
        <tr>
          <th colspan="5" class="totaux">Total TTC</th>
          <td><?php echo $totalHT*1.2 ?></td>
        </tr>
      </tbody>
    </table>
    <?php  } ?>

    <!-- si le panier est vide -->
    <?php if (empty($articles)) {
      $message = "Votre panier est vide !";
    } else { ?>

    <!-- si le panier est bon, on le comfirme -->
  <form class="" action="finalPanier.php" method="post">
    <button class="valid-button" type="submit" name="validPanier">
      <input type="hidden" name="cartId" value="<?php echo $articles[0]['id']; ?>">
      Confirmer !
    </button>
  </form>

  <!-- si on veux modifier une nouvelle fois le panier -->
  <form class="" action="catalogue.php" method="post">
    <button class="modif-button" type="submit" name="modifPanier">
      <input type="hidden" name="ModifPanier" value="ModifPanier">
      Modifier mon panier !
    </button>
  </form>

  <!-- si on veut annuler le panier -->
  <form class="" action="finalPanier.php" method="post">
    <button class="delete-button" type="submit" name="delPanier">
      <input type="hidden" name="cartId" value="<?php echo $articles[0]['id'] ?>">
      Annuler mon panier !
    </button>
  </form>
</div>
<?php } ?>

<!-- le panier est vide on insert un message d'alert -->
<?php if ($message !== "") { ?>
  <div class="alert">
    <strong><?php echo $message ?></strong>
  </div>
  <?php  }?>

<!-- si le panier n'est pas bon, on retourne au catalogue -->
<a href="catalogue.php">Retour au catalogue</a>

<?php include('../footerhtml.php'); ?>
