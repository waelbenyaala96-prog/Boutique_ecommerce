function confirmDelete(url) {
  if (confirm("Supprimer ce produit ?")) {
    window.location = url;
  }
}

function showToast(msg) {
  alert(msg); 
}
