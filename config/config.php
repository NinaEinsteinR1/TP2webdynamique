<?php
// MODEL_DIR est utilisé pour spécifier le dossier où les fichiers de modèle sont stockés
define('MODEL_DIR', 'models');

// VIEW_DIR est utilisé pour spécifier le dossier où les fichiers view sont stockés
define('VIEW_DIR', 'view');

// Tableau de configuration pour établir des valeurs par défaut
$config = array(
    // 'default_controller' spécifie le contrôleur par défaut à utiliser
    'default_controller' => 'base',
    // 'default_function' spécifie la fonction par défaut à appeler
    'default_function' => 'index'
);
?>
