<?php include "fonctions.php";
if (!isset($_GET['id'])) { header("Location: produits.php"); exit; }
$id = $_GET['id'];
supprimerProduit($id);
header("Location: produits.php");
exit;
?>
