<?php

function login()
{
    // Inclusion du fichier de connexion à la base de données
    require('db/connex.php');

    // Nettoyage et sécurisation des données reçues via POST
    // Pour chaque donnée reçue, échappe les caractères spéciaux pour prévenir les injections SQL
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }

    // Vérification de l'existence de l'utilisateur
    // Construction de la requête SQL pour chercher l'utilisateur par son nom
    $sql = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$nomUtilisateur'";

    // Exécution de la requête
    $result = mysqli_query($connex, $sql);

    // Vérification du nombre de lignes retournées
    // Compte le nombre d'utilisateurs trouvés avec ce nom d'utilisateur
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // Vérification du mot de passe
        // Récupération des informations de l'utilisateur
        $info_user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // Log pour le débogage
        error_log("Mot de passe qui vient de la DB : " . $info_user['motDePasse']);
        // Préparation du mot de passe pour la vérification
        $salt = "jesuissalt";
        $saltPassword = $motDePasse . $salt;

        // Vérification du mot de passe
        if (password_verify($saltPassword, $info_user['motDePasse'])) {
            // Si le mot de passe est correct, démarrage de la session et enregistrement de l'ID et du nom de l'utilisateur
            session_start();
            session_regenerate_id();
            $_SESSION['id'] = $info_user['id'];
            $_SESSION['nom'] = $info_user['nom'];
            // Création d'une empreinte digitale pour la session
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);

            // Redirection vers la page du forum
            header('location:index.php?controller=forum&function=afficherForum');
        } else {
            // Redirection vers la page de connexion avec un message d'erreur
            header('location:utilisateur/login.php?msg=2');
        }
    } else {
        // Si aucun utilisateur trouvé, redirection avec un message d'erreur
        header('location:utilisateur/login.php?msg=1');
    }
}
