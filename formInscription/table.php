<?php
include('../headerhtml.php');

if (!is_admin()) {die();};

// création de la requête

$sql = "SELECT * FROM utilisateur";
$users = $instance->query($sql)->fetchAll();
?>

    <h2>Liste des utilisateurs</h2>

    <!-- entête du tableau -->

    <table>
      <thead>
        <th>Nom</th>
        <th>prenom</th>
        <th>Grade</th>
        <th>E-mail</th>
        <th>Rue</th>
        <th>Ville</th>
        <th>Code Postal</th>
        <th>Action</th>
      </thead>
      <tbody>

        <!-- contenu du tableau -->
        <?php
        for ($i=0; $i < count($users); $i++) {

          ?>
        <tr>
          <td><?php echo $users[$i]['nom']; ?></td>
          <td><?php echo $users[$i]['prenom']; ?></td>
          <td><?php echo $users[$i]['groupe_id']; ?></td>
          <td><?php echo $users[$i]['email']; ?></td>
          <td><?php echo $users[$i]['rue']; ?></td>
          <td><?php echo $users[$i]['ville']; ?></td>
          <td><?php echo $users[$i]['codepostal']; ?></td>

        <!-- bouton de modification  et de suppression-->

          <td>
            <form class="" action="index.php" method="post">
              <button type="submit" name="userUpdate" value="">
                <input type="hidden" name="userId"  value="<?php echo $users[$i]['id']; ?>">
                <i class="glyphicon glyphicon-pencil"></i>
              </button>
            </form>
            <form class="" action="index.php" method="post">
              <button type="submit" name="userDelete">
                <input type="hidden" name="userId" value="<?php echo $users[$i]['id']; ?>">
                <i class="glyphicon glyphicon-trash"></i>
              </button>
            </form>
          </td>
        </tr>
  <?php } ?>
      </tbody>
    </table>

<a href="../indexAdmin">Retour index administrateur</a>

  <?php include('../footerhtml.php'); ?>
