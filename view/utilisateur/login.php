<?php

// Initialisation de la variable pour le message d'erreur
$msg = null;
// Vérification si un message d'erreur est passé via l'URL
if (isset($_GET['msg'])) {
    // Affichage de messages spécifiques en fonction de la valeur de 'msg'
    if ($_GET['msg'] == 1) {
        $msg = "Vérifier le nom de l'utilisateur";
    } elseif ($_GET['msg'] == 2) {
        $msg = "Vérifier le mot de passe";
    }
}

?>

<!-- Début du formulaire de connexion -->
<form action="index.php?controller=utilisateur&function=verifierlogin" method="post">
    <!-- Titre du formulaire -->
    <h3>Connexion</h3>

    <!-- Affichage du message d'erreur (si présent) -->
    <span class="text-danger"><?= $msg; ?></span>

    <!-- Champ de saisie pour le nom d'utilisateur / courriel -->
    <label> Courriel :
        <input name="nomUtilisateur" type="email">
    </label>

    <!-- Champ de saisie pour le mot de passe -->
    <label> Mot de passe :
        <input name="motDePasse" type="password">
    </label>

    <!-- Bouton pour soumettre le formulaire -->
    <input type="submit" value="Se Connecter">
</form>
<!-- Fin du formulaire de connexion -->
