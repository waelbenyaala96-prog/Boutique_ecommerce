<?php
// fonctions.php
function dataPath() {
    return __DIR__ . '/data/produits.json';
}

function chargerProduits() {
    $path = dataPath();
    if (!file_exists($path)) {
        file_put_contents($path, json_encode([]));
    }
    $json = file_get_contents($path);
    $arr = json_decode($json, true);
    if (!$arr) return [];
    return $arr;
}

function sauvegarderProduits($produits) {
    $path = dataPath();
    file_put_contents($path, json_encode($produits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function produitParId($id) {
    $produits = chargerProduits();
    foreach ($produits as $p) {
        if ((string)$p['id'] === (string)$id) return $p;
    }
    return null;
}

function ajouterProduit($nom, $prix, $stock, $desc = "", $image = "") {
    $produits = chargerProduits();
    $id = time() . rand(10,99);
    $produits[] = [
        "id" => (string)$id,
        "nom" => $nom,
        "prix" => floatval($prix),
        "stock" => intval($stock),
        "description" => $desc,
        "image" => $image
    ];
    sauvegarderProduits($produits);
    return $id;
}

function modifierProduit($id, $nom, $prix, $stock, $desc = "", $image = "") {
    $produits = chargerProduits();
    foreach ($produits as $i => $p) {
        if ((string)$p['id'] === (string)$id) {
            $produits[$i]['nom'] = $nom;
            $produits[$i]['prix'] = floatval($prix);
            $produits[$i]['stock'] = intval($stock);
            $produits[$i]['description'] = $desc;
            if ($image !== "") $produits[$i]['image'] = $image;
            sauvegarderProduits($produits);
            return true;
        }
    }
    return false;
}

function supprimerProduit($id) {
    $produits = chargerProduits();
    $nouveaux = [];
    foreach ($produits as $p) {
        if ((string)$p['id'] !== (string)$id) $nouveaux[] = $p;
    }
    sauvegarderProduits($nouveaux);
    return true;
}
?>
