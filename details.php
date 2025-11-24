<?php include "includes/header.php"; include "fonctions.php";
if (!isset($_GET['id'])) { header("Location: produits.php"); exit; }
$id = $_GET['id'];
$p = produitParId($id);
if (!$p) { echo "<div class='alert alert-danger'>Produit introuvable</div>"; include "includes/footer.php"; exit; }

// ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty'])) {
    $qty = max(1,intval($_POST['qty']));
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 0;
    $_SESSION['cart'][$id] += $qty;
    header("Location: cart.php");
    exit;
}
?>

<div class="row">
  <div class="col-md-5">
    <img src="<?= $p['image'] ?>" class="img-fluid" alt="">
  </div>
  <div class="col-md-7">
    <h2><?= htmlspecialchars($p['nom']) ?></h2>
    <p class="price"><?= number_format($p['prix'],2) ?> TND</p>
    <p><?= nl2br(htmlspecialchars($p['description'])) ?></p>
    <p>Stock: <span class="badge bg-<?= $p['stock']>0 ? 'success' : 'danger' ?>"><?= $p['stock'] ?></span></p>

    <form method="post" class="d-flex align-items-center gap-2">
      <input type="number" name="qty" value="1" min="1" max="<?= max(1,$p['stock']) ?>" class="form-control" style="width:100px;">
      <button class="btn btn-primary">Ajouter au panier</button>
    </form>
  </div>
</div>

<?php include "includes/footer.php"; ?>
