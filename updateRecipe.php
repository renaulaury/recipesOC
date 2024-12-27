<?php
require_once(__DIR__ . '/template.php');

if (isset($_POST['submit'])) {
    $nom_recette = filter_input(INPUT_POST, 'nom_recette', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $temps = filter_input(INPUT_POST, 'temps_preparation', FILTER_VALIDATE_INT);
    $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($nom_recette && $temps && $instructions) {
        $add = $mysqlClient->prepare('
                UPDATE recette
                SET nom_recette = :nom_recette, 
                temps_preparation = :temps_preparation, 
                instructions = :instructions
                WHERE id_recette = :id_recette
                ');
        $add->execute([
            'nom_recette' => $nom_recette,
            'temps_preparation' => $temps,
            'instructions' => $instructions,
            'id_recette' => $_POST['id_recette']
        ]);
        echo "Recette modifiée avec succès.";
    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}
