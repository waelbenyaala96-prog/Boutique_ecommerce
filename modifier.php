<?php include "includes/header.php"; include "fonctions.php";
if (!isset($_GET['id'])) { header("Location: produits.php"); exit; }
$id = $_GET['id'];
$p = produitParId($id);
if (!$p) { echo "<div class='alert alert-danger'>Produit introuvable</div>"; include "includes/footer.php"; exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    modifierProduit($id, $_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['description'], $_POST['image']);
    header("Location: produits.php");
    exit;
}
?>

<h3>Modifier produit</h3>
<form method="post">
  <div class="mb-3"><label>Nom</label><input name="nom" value="<?= htmlspecialchars($p['nom']) ?>" class="form-control" required></div>
  <div class="mb-3"><label>Prix</label><input type="number" step="0.01" name="prix" value="<?= $p['prix'] ?>" class="form-control" required></div>
  <div class="mb-3"><label>Stock</label><input type="number" name="stock" value="<?= $p['stock'] ?>" class="form-control" required></div>
  <div class="mb-3"><label>Image (URL)</label><input name="image" value="<?= htmlspecialchars($p['image']) ?>" class="form-control"></div>
  <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"><?= htmlspecialchars($p['description']) ?></textarea></div>
  <button class="btn btn-primary">Enregistrer</button>
</form>

<?php include "includes/footer.php"; ?>
