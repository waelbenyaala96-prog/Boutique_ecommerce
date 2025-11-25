<?php include "includes/header.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // vider panier (commande simulée)
    session_start();
    unset($_SESSION['cart']);
    echo "<div class='alert alert-success'>Merci ! Commande enregistrée (simulation).</div>";
    echo "<a href='index.php' class='btn btn-primary'>Retour accueil</a>";
    include "includes/footer.php";
    exit;
}
?>
<h3>Checkout</h3>
<p>Page de paiement simulée. Cliquer pour confirmer la commande.</p>

<form method="post">
  <div class="mb-3">
    <label>Nom complet</label>
    <input class="form-control" required name="nom">
  </div>
  <div class="mb-3">
    <label>Adresse</label>
    <input class="form-control" required name="adresse">
  </div>
  <button class="btn btn-success">Confirmer la commande (simulation)</button>
</form>

<?php include "includes/footer.php"; ?>
