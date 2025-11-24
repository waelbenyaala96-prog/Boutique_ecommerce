<?php include "includes/header.php"; include "fonctions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom']; $prix = $_POST['prix']; $stock = $_POST['stock'];
    $desc = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? 'https://via.placeholder.com/300x200?text=Produit';
    ajouterProduit($nom,$prix,$stock,$desc,$image);
    header("Location: produits.php");
    exit;
}
?>

<h3>Ajouter un produit</h3>

<form method="post">
  <div class="mb-3"><label>Nom</label><input name="nom" class="form-control" required></div>
  <div class="mb-3"><label>Prix</label><input type="number" step="0.01" name="prix" class="form-control" required></div>
  <div class="mb-3"><label>Stock</label><input type="number" name="stock" class="form-control" required></div>
  <div class="mb-3"><label>Image (URL)</label><input name="image" class="form-control"></div>
  <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
  <button class="btn btn-success">Ajouter</button>
</form>

<?php include "includes/footer.php"; ?>
