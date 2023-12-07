<?php

// Fonction 'safe' : Sécurise une chaîne de caractères
// Cette fonction ajoute des antislashs devant les caractères qui en ont besoin (comme les guillemets)
function safe($params)
{
    return addslashes($params);
}

// Fonction 'render' : Affiche une vue avec un layout optionnel
// '$file' est le chemin du fichier de la vue à afficher
// '$data' est un tableau optionnel de données à passer à la vue
function render($file, $data = null)
{
    // Chemin vers le fichier de layout principal
    $layout_file = VIEW_DIR . '/layouts/layout.php';

    // Démarrage de la mise en mémoire tampon de sortie (output buffering)
    ob_start();

    // Inclusion du fichier de vue spécifié
    // VIEW_DIR est une constante définie dans 'config.php' qui indique le dossier des vues
    include_once(VIEW_DIR . $file);

    // Capture du contenu de la mise en mémoire tampon et fin de la mise en mémoire tampon
    $content = ob_get_clean();

    // Inclusion du fichier de layout qui peut utiliser la variable '$content'
    include_once($layout_file);
}
