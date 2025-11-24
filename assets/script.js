// script.js minimal pour confirmations
function confirmDelete(url) {
  if (confirm("Supprimer ce produit ?")) {
    window.location = url;
  }
}

// simple toast (bootstrap)
function showToast(msg) {
  alert(msg); // simple, remplace par une toast si besoin
}
