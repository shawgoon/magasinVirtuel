<?php include('../headerhtml.php'); ?>

<?php if (!is_admin()) {die();}; ?>

<!-- recupération des paniers -->
<?php
$sql = "SELECT panier.id, utilisateur.nom AS userName, utilisateur.prenom, article.nom AS articleName
FROM panier
INNER JOIN utilisateur ON panier.utilisateur_id = utilisateur.id
INNER JOIN article ON panier.article_id = article.id
ORDER BY panier.id";
$basketList = $instance->query($sql)->fetchAll();
// $sql = "SELECT article.nom AS articleName FROM panier INNER JOIN utilisateur ON panier.utilisateur_id = utilisateur.id INNER JOIN article ON panier.article_id = article.id WHERE panier.id";
// $basketUser = $instance->query($sql)->fetchAll();

 ?>


<table>
  <thead>
    <tr>
      <th>commande n°</th>
      <th>Client</th>
      <th>liste des articles</th>
      <th>Edition de la facture</th>
    </tr>
  </thead>
  <?php for ($i = 0; $i < count($basketList); $i++) { ?>
  <tbody>
    <tr>
        <td><?php echo $basketList[$i]['id']; ?></td>
        <td><?php echo $basketList[$i]['userName']." ".$basketList[$i]['prenom']; ?></td>
        <td>

          <?php echo $basketList[$i]['articleName']."<br>"; ?>
        </td>
        <td>
          <form class="" action="editFacture.php" method="post">
            <button class="edit" type="submit" name="editFact" value="">
              <input type="hidden" name="panierId"  value="<?php echo $basketList[$i]['id'] ?>">Editer la facture
            </button>
          </form>
        </td>
      </tr>
    </tbody>
    <?php } ?>
  </table>

  <a href="../indexAdmin">Retour index administrateur</a>

<?php include('../footerhtml.php'); ?>
