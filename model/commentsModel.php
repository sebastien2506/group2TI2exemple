<?php

// Chargement de tous les commentaires
function getComments(PDO $db): array
{
    $sql = "SELECT * FROM comments ORDER BY date_heure ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

// Insertion d'un commentaire
function addComments(PDO $db, string $nom, string $courriel, string $titre, string $texte): bool|string
{
    // on récupère les données en assurant leur sécurité
    $nom = htmlspecialchars(strip_tags(trim($nom)),ENT_QUOTES);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $titre = htmlspecialchars(strip_tags($titre), ENT_QUOTES);
    $texte = htmlspecialchars(strip_tags(trim($texte)), ENT_QUOTES);
    // si les données ne sont pas valides, on envoie false
    if(empty($nom) || $courriel===false || empty($titre) || empty($texte)){
        return false;
    }
    // on prépare la requête
    $sql = "INSERT INTO comments (nom, courriel, titre, texte) VALUES ('$nom', '$courriel', '$titre', '$texte')";
    try{
        // on exécute la requête
        $db->exec($sql);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }

}