<?php

// Vérification si l'identifiant 'id' est présent dans l'URL et n'est pas vide
if(isset($_GET['id']) && $_GET['id'] != null) {
    // Inclusion du fichier de connexion à la base de données
    require('db/connex.php');

    // Nettoyage de l'identifiant pour prévenir les injections SQL
    $id = mysqli_real_escape_string($connex, $_GET['id']);
    
    // Requête SQL pour sélectionner un client par son ID
    $sql = "SELECT * FROM client WHERE id = '$id'";
    // Exécution de la requête
    $result = mysqli_query($connex, $sql);

    // Comptage du nombre de lignes retournées par la requête
    $count = mysqli_num_rows($result);

    // Vérification si un client existe
    if($count == 1) {
        // Récupération des données du client sous forme de tableau associatif
        $client = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        // Redirection vers la page d'index des clients si aucun client n'est trouvé
        header('location: client-index.php');
    }
} else {
    // Redirection vers la page d'index des clients si l'ID n'est pas fourni dans l'URL
    header('location: client-index.php');
}

// Titre de la page défini pour être utilisé dans le header
$title = 'Afficher Client';
// Inclusion du fichier de header (en-tête)
require('library/header.php');
