<?php include "includes/header.php"; include "fonctions.php";
$produits = chargerProduits();
$cart = $_SESSION['cart'] ?? [];

if (isset($_GET['remove'])) {
    $rid = $_GET['remove'];
    unset($_SESSION['cart'][$rid]);
    header("Location: cart.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    foreach ($_POST['qty'] as $id => $q) {
        $q = max(0,intval($q));
        if ($q === 0) unset($_SESSION['cart'][$id]); else $_SESSION['cart'][$id] = $q;
    }
    header("Location: cart.php");
    exit;
}

// calcul total
$total = 0;
$items = [];
foreach ($cart as $id => $qty) {
    $p = produitParId($id);
    if ($p) {
        $p['qty'] = $qty;
        $p['subtotal'] = $qty * $p['prix'];
        $total += $p['subtotal'];
        $items[] = $p;
    }
}
?>

<h3>Mon panier</h3>

<?php if (empty($items)): ?>
  <div class="alert alert-info">Ton panier est vide.</div>
<?php else: ?>
<form method="post">
<table class="table">
  <thead><tr><th>Produit</th><th>Prix</th><th>Qté</th><th>Sous-total</th><th></th></tr></thead>
  <tbody>
    <?php foreach ($items as $it): ?>
    <tr>
      <td><?= htmlspecialchars($it['nom']) ?></td>
      <td><?= number_format($it['prix'],2) ?> TND</td>
      <td><input type="number" name="qty[<?= $it['id'] ?>]" value="<?= $it['qty'] ?>" min="0" class="form-control" style="width:100px"></td>
      <td><?= number_format($it['subtotal'],2) ?> TND</td>
      <td><a href="?remove=<?= $it['id'] ?>" class="btn btn-sm btn-danger">Retirer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="d-flex justify-content-between align-items-center">
  <div><button name="update" class="btn btn-secondary">Mettre à jour</button></div>
  <div><strong>Total : <?= number_format($total,2) ?> TND</strong> <a href="checkout.php" class="btn btn-success ms-3">Commander</a></div>
</div>
</form>
<?php endif; ?>

<?php include "includes/footer.php"; ?>
