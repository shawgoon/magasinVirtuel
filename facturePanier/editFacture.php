<?php include('../headerhtml.php') ?>
<?php
if (!is_admin()) {die();};

$totalHT = 0;
 ?>

<?php
$sql = "SELECT utilisateur.nom AS 'userName', utilisateur.prenom, utilisateur.rue, utilisateur.codepostal, utilisateur.ville, utilisateur.email, article.id AS 'articleId', article.nom AS 'articleName', article.description, article.prix, panier.id AS 'panierId', panier.quantite FROM panier INNER JOIN utilisateur ON panier.utilisateur_id = utilisateur.id INNER JOIN article ON panier.article_id = article.id  WHERE panier.id = ".$_POST['panierId'];
$resultat = $instance->query($sql)->fetchAll();
for ($i=0; $i < count($resultat); $i++) {
  $total = $resultat[$i]['prix']*$resultat[$i]['quantite'];
  $totalHT += $total;
  $mail = $resultat[$i]['email'];

  if (!isset($userName) || $userName !== $resultat[$i]['userName']) {
    if ($i !== 0) {?></table><?php } ?>


<strong class="adress"><?php echo $resultat[$i]['userName']." "; echo $resultat[$i]['prenom']."<br>"; ?></strong>
<p class="adress"><?php
echo $resultat[$i]['rue']."<br>";
echo $resultat[$i]['codepostal']." ".$resultat[$i]['ville']."<br>";
echo $resultat[$i]['email']; ?></p>

<!-- contenu de facture -->

<table>
  <h4>Commande n° <?php echo $resultat[$i]['panierId']; ?></h4>

  <!-- entête de tableau -->

  <thead>
    <tr>
      <th>Id Article</th>
      <th>Nom de l'article</th>
      <th>Description</th>
      <th>Quantité</th>
      <th>Prix Unitaire</th>
      <th>Remise</th>
      <th>Total HT</th>
    </tr>
  </thead>
  <tbody>
  <?php } ?>
    <tr>
      <td><?php echo $resultat[$i]['articleId']; ?></td>
      <td><?php echo $resultat[$i]['articleName']; ?></td>
      <td><?php echo $resultat[$i]['description']; ?></td>
      <td><?php echo $resultat[$i]['quantite']; ?></td>
      <td><?php echo $resultat[$i]['prix']." €"; ?></td>
      <td><?php  ?></td>
      <td><?php echo $total." €"; ?></td>
    </tr>
    <?php
    $userName = $resultat[$i]['userName'];

  } ?>

   <!-- calcul des totaux -->
   <tr>
     <th class="totaux" colspan="6">Total HT</th>
     <td><?php echo $totalHT." €" ?></td>
   </tr>
   <tr>
     <th class="totaux" colspan="6">TVA</th>
     <?php $totalTVA = $totalHT * 0.20; ?>
     <td><?php echo $totalTVA." €" ?></td>
   </tr>
   <tr>
     <th class="totaux" colspan="6">Total TTC</th>
     <?php $totalTTC = $totalHT + $totalTVA; ?>
     <td><?php echo $totalTTC." €" ?></td>
   </tr>
 </tbody>
 </table>
   <section>
     <a href="<?php  ?>">Envoyer par email</a>
     <a href="table.php">Retour à la liste des paniers</a>
   </section>
<?php include('../footerhtml.php'); ?>
