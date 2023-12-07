<!-- Début du formulaire pour la création d'un nouvel article prend la fonction dans le controlleur -->
<form action="index.php?controller=utilisateur&function=ajouterforum" method="post">
    <!-- Titre du formulaire -->
    <h3>Rédiger un article</h3>

    <!-- Champ pour le titre de l'article -->
    <label for="titre">Titre:</label>
    <input id="titre" name="titre" type="text" required>

    <!-- Zone de texte pour le contenu de l'article -->
    <label for="article">Article:</label>
    <textarea id="article" name="article" required></textarea>

    <!-- Bouton de soumission du formulaire -->
    <input type="submit" value="Publier l'article">
</form>
<!-- Fin du formulaire -->
