<!-- Début du formulaire d'inscription envoi a la fonction register -->
<form action="index.php?controller=utilisateur&function=register" method="post">
    <!-- Titre du formulaire -->
    <h3>Inscription</h3>

    <!-- Affichage d'un message d'erreur, s'il existe -->
    <span class="text-danger"><?php $msg = isset($msg) ? $msg : ''; ?></span>

    <!-- Champ pour le nom complet de l'utilisateur -->
    <label> Nom :
        <input name="nom" type="text">
    </label>

    <!-- Champ pour le nom d'utilisateur (courriel), requis -->
    <label> Nom utilisateur (Email) :
        <input name="nomUtilisateur" type="email" required>
    </label>

    <!-- Champ pour le mot de passe, avec une longueur minimale et maximale, requis -->
    <label> Mot de passe :
        <input name="motDePasse" type="password" required minlength="6" maxlength="20">
    </label>

    <!-- Champ pour la date de naissance, requis -->
    <label> Date De Naissance :
        <input name="dateDeNaissance" type="date" required>
    </label>

    <!-- Bouton pour soumettre le formulaire -->
    <input type="submit" value="valider">
</form>
<!-- Fin du formulaire d'inscription -->
