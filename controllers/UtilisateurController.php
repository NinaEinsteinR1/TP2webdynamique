<?php

/**
 * Fonction ajouterForum : Traite l'ajout d'un nouvel article dans le forum. *****ne fonctionne pas
 */
function ajouterforum()
{
    // Démarre une nouvelle session.
    session_start();
    // Inclut le fichier de connexion à la base de données.
    require_once('db/connex.php');

    // Vérifie si la méthode de la requête est POST.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données du formulaire.
        $titre = $_POST['titre'];
        $article = $_POST['article'];
        $author_id = $_SESSION['id'];
        date_default_timezone_set("America/Montreal");
        $date = date('Y-m-d');
        $nom = $_SESSION['nom'];
        $id_utilisateur = $_SESSION['id_utilisateur'];

        // Prépare et exécute la requête d'insertion de l'article.
        $query = "INSERT INTO `forum`(`id_Article`, `titre`, `article`, `datePublication`, `auteur`, `id_Utilisateur`) 
                  VALUES ('','$titre','$article','$date','$nom','$id_utilisateur')";

        // Vérifie si l'insertion a réussi et redirige ou affiche un message.
        if (mysqli_query($connex, $query)) {
            header("Location: index.php");
        } else {
            echo "Erreur lors de l'insertion de l'article : " . mysqli_error($connex);
        }
    }
}

/**
 * Fonction index : Affiche la page de connexion utilisateur.
 */
function index()
{
    // Appelle la fonction render pour afficher la vue de connexion utilisateur.
    render('/utilisateur/login.php');
}

/**
 * Fonction register : Traite l'inscription d'un nouvel utilisateur.
 */
function register()
{
    // Inclut le fichier de connexion à la base de données.
    require('db/connex.php');

    // Nettoie et sécurise les données reçues via POST.
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }

    // Génère un mot de passe haché avec un "salt" pour renforcer la sécurité.
    $salt = "jesuissalt";
    $saltPassword = $motDePasse . $salt;
    $password = password_hash($saltPassword, PASSWORD_BCRYPT, ['cost' => 10]);

    // Vérifie si le nom d'utilisateur est déjà utilisé.
    $checkUser = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$nomUtilisateur'";
    $userExists = mysqli_query($connex, $checkUser);

    // Si le nom d'utilisateur est déjà pris, arrête l'exécution de la fonction.
    if (mysqli_num_rows($userExists) > 0) {
        echo "Nom d'utilisateur déjà pris";
        return;
    }

    // Prépare et exécute la requête SQL pour insérer le nouvel utilisateur.
    $sql = "INSERT INTO utilisateur (nom, nomUtilisateur, motDePasse, dateDeNaissance) 
            VALUES ('$nom', '$nomUtilisateur', '$password', '$dateDeNaissance')";

    // Vérifie si l'insertion a réussi et redirige ou affiche un message.
    if (mysqli_query($connex, $sql)) {
        header('location: index.php?controller=utilisateur&function=index');
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($connex);
    }
}

/**
 * Fonction ajouter : Affiche la page d'inscription utilisateur.
 */
function ajouter()
{
    // Appelle la fonction render pour afficher la vue d'inscription.
    render('/utilisateur/register.php');
}

/**
 * Fonction verifierlogin : Appelle la fonction de connexion utilisateur.
 */
function verifierlogin()
{
    // Inclut le modèle utilisateur et appelle la fonction de connexion.
    require('models/utilisateur.php');
    login();
}

/**
 * Fonction creerForum : Affiche la page de création d'un nouveau forum.
 */
function creerForum()
{
    // Appelle la fonction render pour afficher la vue de création de forum.
    render('/utilisateur/creer.php');
}

