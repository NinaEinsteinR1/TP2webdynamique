<?php
    // Inclusion du fichier de connexion à la base de données
    require('db/connex.php');

    // Sécurisation de l'identifiant récupéré depuis l'URL
    $id = mysqli_real_escape_string($connex, $_GET['id']);

    // Requête SQL pour récupérer tous les articles du forum
    $sql = "SELECT * FROM forum";
    // Exécution de la requête
    $result = mysqli_query($connex, $sql);
    // Comptage du nombre de lignes retournées
    $count = mysqli_num_rows($result);

    // Initialisation de la variable 'client'
    $client = "";
    // Si exactement 2 articles sont trouvés (à modifier selon la logique souhaitée)
    if($count == 2){
        // Récupération du premier article
        $client = mysqli_fetch_array($result);
    }

    // Titre de la page défini pour être utilisé dans le header
    $title = 'Afficher Client';

    // Boucle sur chaque ligne (article) retournée par la requête
    foreach($result as $row) { 
        // Début du formulaire (à modifier si nécessaire)
        echo "<form>";
        // Affichage de l'auteur
        echo "<p> <strong>auteur : </strong>" . $row['auteur'] . " </p>";
        
        // Affichage du titre
        echo "<p> <strong>titre : </strong>" . $row['titre'] . " </p>";

        // Affichage de la date de publication
        echo "<p> <strong>date de publication : </strong>" . $row['datePublication'] . " </p>";
       
        // Affichage de l'article
        echo "<p> <strong>article : </strong>" . $row['article'] . " </p>";
        
        // Démarrage de la session
        session_start();
        // Vérification si l'utilisateur connecté est l'auteur de l'article
        if ($_SESSION['nom'] == $row['auteur']){
            // Formulaire pour supprimer l'article (à modifier selon la logique souhaitée)
            echo "<form action='index.php?controller=utilisateur&function=supprimer' method='post'>";
            echo "<li><a href='index.php?controller=utilisateur&function=supprimer'>supprimer</a></li>";
            echo "</form>";
        };
        // Fin du formulaire
        echo "</form>";
    }
?>
