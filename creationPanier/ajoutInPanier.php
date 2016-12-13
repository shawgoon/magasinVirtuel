<?php include('../headerhtml.php'); ?>
<?php
//  si on veut ajouter un article et que l'utilisateur est bien connecté
if (isset($_POST['addArticle']) && is_log()) {
  $updateCartArticle = false;

// on recherche si l'utilisateur courant à un panier en cours.
  $sql = "SELECT *
  FROM panier
  WHERE utilisateur_id = ".get_current_user_id()
  .'AND statut = "pending"'
  ;
  $lastPanier = $instance->query($sql);

  // si oui :
  if (!empty($lastPanier)) {
    // on regarde si nous avons déjà l'article dans le panier.
    foreach ($lastPanier as $cartRow) {
      // Si oui, on indique que l'on veut faire une mise à jour de l'article et non en ajouter un nouveau.
      if ($cartRow['article_id'] === $_POST['articleId']) {
        $articleQuantite = $cartRow['quantite'];
      }
      // on sauvegarde l'id du panier.
      $panierId = $cartRow['id'];
    }
    // sinon l'utilisateur n'a pas de panier
    } else {
      // on récupère le dernier panier avec son ID.
      $sql = "SELECT id FROM panier ORDER BY id DESC";
      $lastId = $instance->query($sql)->fetch();
      // on incrémente manuellement l'id du nouveau panier.
      $panierId = $lastId['id'] + 1;
    }
  // Si on veut modifier un article du panier.
  if (isset($articleQuantite)) {
    // On calcul la nouvelle quantité, le nombre que l'on veut ajouter additionner au nobre actuel en BDD.
    $newQuantite = $articleQuantite + $_POST['quantite'];
    $sql = "UPDATE panier SET quantite = ".$newQuantite."
    WHERE id = ".$panierId." AND article_id = ".$_POST['articleId'];
  } else {
    $sql = "INSERT INTO panier (id, utilisateur_id, article_id, quantite, statut) VALUES (".$panierId.",".get_current_user_id().",".$_POST['articleId'].",".$_POST['quantite'].", 'pending')";var_dump($sql);
  }
  // On execute la requete
  $result = $instance->exec($sql);
  // On affiche le message en fonction du résultat
  if ($result) {
    $message = "Article ajouté au panier !";
  } else {
    $message = "l'article n'a pas été ajouté !";
  }
}
?>

<header>
  <h4><?php echo $message ?></h4>
</header>
<hr>
<section>
  <a href="catalogue.php">Retour au catalogue</a>
</section>


<?php include('../footerhtml.php'); ?>
