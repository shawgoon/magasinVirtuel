<?php include('../headerhtml.php'); ?>

<!-- requête de tous les articles de la BDD -->
<?php
$sql = "SELECT * FROM article";
$cart = $instance->query($sql)->fetchAll();
?>

<!-- requête de suppression d'article -->
<?php
 if (isset($_POST['articleDelete'])) {
  $sql = "DELETE FROM panier WHERE panier.id AND panier.utilisateur_id = ".get_current_user_id()." AND panier.article_id = articleId"/*article_id"*/;
  $trash =  $instance->exec($sql);
  }?>

<!-- entête du catalogue -->
<div class="head">

  <!-- bouton administrateur -->
  <div >
    <?php if (is_admin()) { ?>
      <form class="" action="../indexAdmin.php" method="post">
        <input  class="admin" type="submit" name="" value="Admin only">
      </form>
      <?php } ?>
    </div>

    <!-- le panier provisoire -->
    <div class="panier">
        <h3>mon panier</h3>
        <div class="addArticle">
          <?php
          $sql = "SELECT panier.id, panier.quantite, article.nom, article.prix
          FROM panier
          INNER JOIN article ON panier.article_id = article.id
          WHERE utilisateur_id = ".get_current_user_id()
          ." AND statut = 'pending'";

          $articles = $instance->query($sql)->fetchAll();
           ?>
          <?php foreach ($articles as $article) { ?>
            <p class='achat'>
              <?php echo $article['id']." "; ?>
              <?php echo $article['quantite']." ";
              echo $article['nom']." "; ?>
            <span class="float-right"> <?php
              echo $article['prix']." €"; ?>

                <input type="hidden" name="articleId" value="<?php echo $article['id'] ?>">
                <button class="del-button" action="catalogue.php" method="post" type="submit" name="articleDelete">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              
            </span>
          </p> <?php } ?>
        </div>
        <form class="" action="validPanier.php" method="post">
          <button class="command-button" type="submit" name="validPanier">
            <input type="hidden" name="articleId" value="">
            Commander
          </button>
          <p>Pour valider c'est ici <span class="glyphicon glyphicon-arrow-right"></span></p>
        </form>
    </div>

    <!-- entête de connection -->
    <div class="statut">
      <div class="connect">
        <h4>Bonjour,</h4>
          <?php if ($_SESSION['user']) {
                  $connected = true;
              $message = "connecté !";
            } else {
              $message = "";
            } ?>
            <h4><?php echo $_SESSION['user']['userName'] ?></h4>
        <p><?php echo $message ?></p>
      </div>
      <form action="../logout.php" method="post">
        <input class="deco" type="submit" name="" value="Déconnection">
    </form>
  </div>
</div>

<!-- cartes des articles -->
<?php for ($i=0; $i < count($cart); $i++) { ?>
<div class="cart">
    <h4><?php echo $cart[$i]['nom']; ?></h4>
    <img src="" alt="">
    <p><?php echo $cart[$i]['description']; ?></p>
    <p><?php echo $cart[$i]['prix']." HT €"; ?></p>
    <label for="">Quantité</label>
  <form class="" action="ajoutInPanier.php" method="post">
    <input class="qte" type="number" name="quantite" value="">
    <button class="glyphicon glyphicon-shopping-cart" type="submit" name="addArticle" value="addArticle">
      <input type="hidden" name="articleId" value="<?php echo $cart[$i]['id'] ?>">
    </button>
  </form>
</div>
<?php } ?>

<?php include('../footerhtml.php'); ?>
