<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum M9</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?controller=utilisateur&function=ajouter">Ajouter Utilisateur</a></li>
            <li><a href="index.php?controller=utilisateur&function=index">Connexion</a></li>
            <li><a href="index.php?controller=utilisateur&function=creerForum">Creer Article</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>