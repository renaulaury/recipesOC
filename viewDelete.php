<?php

require_once(__DIR__ . '/template.php');

$id = $_GET['id_recette'] ?? null;

if ($id) {
    $mep = $mysqlClient->prepare('SELECT * FROM recette WHERE id_recette = :id');
    $mep->execute([':id' => $id]);
    $recette = $mep->fetch(PDO::FETCH_ASSOC);


    if ($recette) { ?>
        <h2>Supprimer <?= $recette['nom_recette'] ?> ?</h2>
        <a href="deleteRecipe.php?id_recette=<?= $recette['id_recette'] ?>">Oui supprimer</a>
<?php }
} ?>