<?php

require_once(__DIR__ . '/index.php');

$id = $_GET['id_recette'] ?? null;

if ($id) {
    $mep = $datas->prepare('SELECT * FROM recette WHERE id_recette = :id');
    $mep->execute(['id_recette' => $id]);
    $recette = $mep->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Ya pas de recette affiliée.";
}


if (isset($_POST['submit'])) {
    $nom_recette = filter_input(INPUT_POST, 'nom_recette', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $temps = filter_input(INPUT_POST, 'temps_preparation', FILTER_VALIDATE_INT);
    $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($nom_recette && $temps && $instructions) {

        $update = $mysqlClient->prepare('UPDATE recette 
                SET nom_recette = :nom_recette, 
                    temps_preparation = :temps_preparation,
                    instructions = :instructions,
                    id_categorie = :id_categorie
                    WHERE id_recette = :id');
        $update->execute([
            'nom_recette' => $nom_recette,
            'temps_preparation' => $temps,
            'instructions' => $instructions,
            'id_categorie' => 2,
            // 'id_recette' => :id
        ]);
        echo "Recette modifiée avec succès.";
    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}
