<?php

require_once(__DIR__ . '/index.php');


if (isset($_POST['submit'])) {
    $nom_recette = filter_input(INPUT_POST, 'nom_recette', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $temps = filter_input(INPUT_POST, 'temps_preparation', FILTER_VALIDATE_INT);
    $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($nom_recette && $temps && $instructions) {
        $add = $mysqlClient->prepare('INSERT INTO recette(nom_recette, temps_preparation, instructions, id_categorie) 
        VALUES (:nom_recette, :temps_preparation, :instructions, :id_categorie)');
        $add->execute([
            'nom_recette' => $nom_recette,
            'temps_preparation' => $temps,
            'instructions' => $instructions,
            'id_categorie' => 2
        ]);
        echo "Recette ajoutée avec succès.";
    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}
