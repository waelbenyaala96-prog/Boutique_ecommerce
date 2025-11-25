<?php include "includes/header.php"; ?>
<?php include "fonctions.php"; ?>

<div class="hero mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h1 class="display-6">Bienvenue sur Boutique Pro</h1>
      <p class="lead">Une mini boutique moderne—catalogue, panier, dashboard et gestion des produits.</p>
      <a href="/boutique_pro/produits.php" class="btn btn-light btn-lg">Voir les produits</a>
    </div>
    <img src="/boutique_pro/assets/img/hero.png" style="max-height:140px;" alt="">
  </div>
</div>

<h3>Wael Boutique • Vente en ligne</h3>
    





<div class="row">
<?php
$produits = chargerProduits();
$vedette = array_slice($produits, 0, 4);
foreach ($vedette as $p):
?>
  <div class="col-md-3 mb-4">
    <div class="card card-product">
      <img src="<?= $p['image'] ?>" class="card-img-top product-img" alt="">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($p['nom']) ?></h5>
        <p class="price"><?= number_format($p['prix'],2) ?> TND</p>
        <p>
          <a href="/boutique_pro/details.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Voir</a>
          <a href="/boutique_pro/produits.php" class="btn btn-outline-secondary btn-sm">Catalogue</a>
        </p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<?php include "includes/footer.php"; ?>
