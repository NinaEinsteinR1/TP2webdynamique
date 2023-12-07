<!-- Début du formulaire pour l'ajout d'un article -->
<form action="index.php?controller=forum&function=addArticle" method="post">
    <!-- Titre du formulaire -->
    <h3>écrire un article</h3>

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
