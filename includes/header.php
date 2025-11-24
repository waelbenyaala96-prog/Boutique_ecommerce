<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Boutique Pro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/boutique_pro/assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/boutique_pro/index.php">Boutique Pro</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/boutique_pro/produits.php">Produits</a></li>
        <li class="nav-item"><a class="nav-link" href="/boutique_pro/ajouter.php">Ajouter</a></li>
        <li class="nav-item"><a class="nav-link" href="/boutique_pro/dashboard.php">Dashboard</a></li>
      </ul>
      <form class="d-flex" action="/boutique_pro/produits.php" method="get">
        <input class="form-control me-2" name="q" placeholder="Rechercher...">
        <button class="btn btn-light" type="submit">Go</button>
      </form>
      <ul class="navbar-nav ms-3">
        <li class="nav-item">
          <a class="nav-link position-relative" href="/boutique_pro/cart.php">
            Panier
            <?php $count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>
            <span class="badge bg-danger ms-1"><?= $count ?></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
