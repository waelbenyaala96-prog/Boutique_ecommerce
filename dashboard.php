<?php include "includes/header.php"; include "fonctions.php";
$produits = chargerProduits();
$totalProduits = count($produits);
$valeurStock = 0;
$rupture = 0;
foreach ($produits as $p) { $valeurStock += $p['prix'] * $p['stock']; if ($p['stock'] == 0) $rupture++; }
?>

<h3>Dashboard</h3>

<div class="row">
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Total produits</h5>
      <h2><?= $totalProduits ?></h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Valeur du stock</h5>
      <h2><?= number_format($valeurStock,2) ?> TND</h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3">
      <h5>Produits en rupture</h5>
      <h2><?= $rupture ?></h2>
    </div>
  </div>
</div>

<div class="mt-4">
  <h5>Liste des produits</h5>
  <table class="table">
    <thead><tr><th>Nom</th><th>Prix</th><th>Stock</th></tr></thead>
    <tbody>
      <?php foreach ($produits as $p): ?>
      <tr><td><?= htmlspecialchars($p['nom']) ?></td><td><?= number_format($p['prix'],2) ?></td><td><?= $p['stock'] ?></td></tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include "includes/footer.php"; ?>
