<?php include "includes/header.php"; include "fonctions.php";

$produits = chargerProduits();

// recherche
$q = isset($_GET['q']) ? trim($_GET['q']) : "";
if ($q !== "") {
    $produits = array_filter($produits, function($p) use ($q) {
        return stripos($p['nom'], $q) !== false || stripos($p['description'], $q) !== false;
    });
}

// tri
$sort = $_GET['sort'] ?? '';
if ($sort === 'prix_asc') usort($produits, fn($a,$b)=> $a['prix'] <=> $b['prix']);
if ($sort === 'prix_desc') usort($produits, fn($a,$b)=> $b['prix'] <=> $a['prix']);
if ($sort === 'nom') usort($produits, fn($a,$b)=> strcmp($a['nom'],$b['nom']));

// pagination simple
$page = max(1, intval($_GET['page'] ?? 1));
$perPage = 8;
$total = count($produits);
$pages = ceil($total / $perPage);
$start = ($page-1)*$perPage;
$paginated = array_slice($produits, $start, $perPage);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Catalogue (<?= $total ?> produits)</h3>
  <div>
    <a href="/boutique_pro/ajouter.php" class="btn btn-success btn-sm">+ Ajouter un produit</a>
  </div>
</div>

<div class="row">
<?php foreach ($paginated as $p): ?>
  <div class="col-md-3 mb-4">
    <div class="card card-product">
      <img src="<?= $p['image'] ?>" class="card-img-top product-img" alt="">
      <div class="card-body">
        <h5><?= htmlspecialchars($p['nom']) ?></h5>
        <p class="price"><?= number_format($p['prix'],2) ?> TND</p>
        <p>
          <a href="/boutique_pro/details.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Détails</a>
          <a href="/boutique_pro/modifier.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
          <a href="javascript:confirmDelete('/boutique_pro/supprimer.php?id=<?= $p['id'] ?>')" class="btn btn-danger btn-sm">Supprimer</a>
        </p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<nav>
  <ul class="pagination">
    <?php for($i=1;$i<=$pages;$i++): ?>
      <li class="page-item <?= $i==$page ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?><?= $q? '&q='.urlencode($q) : '' ?><?= $sort? '&sort='.$sort : '' ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>

<?php include "includes/footer.php"; ?>
