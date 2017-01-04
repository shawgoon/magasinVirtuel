<?php
$user = "root";
$mdp = "";
$host = "localhost";
$dbName = "magasin";

try
{
  $instance = new PDO ("mysql:host=".$host.";dbname=".$dbName, $user, $mdp);
} catch (PDOException $e){
  die('Erreur :'.$e->getMessage());
} ?>
