<?php

// Établissement de la connexion à la base de données
// '127.0.0.1' est l'adresse du serveur de base de données (localhost)
// 'root' est le nom d'utilisateur par défaut pour MySQL
// Le troisième argument est le mot de passe, ici laissé vide
// 'forum_m9' est le nom de la base de données à laquelle se connecter
// '3306' est le port par défaut pour MySQL
$connex = mysqli_connect('127.0.0.1', 'root', '', 'forum_m9', '3306');

// Vérification si la connexion a échoué
if (mysqli_connect_error()) {
    // Affichage du message d'erreur et arrêt du script en cas d'échec de la connexion
    echo "Échec de la connexion à MySQL : " . mysqli_connect_error();
    exit();
}

// Configuration du jeu de caractères en UTF-8 pour la connexion
// Cela assure la bonne gestion des caractères spéciaux ou accentués
mysqli_set_charset($connex, "utf8");
