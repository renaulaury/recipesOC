<?php

require_once(__DIR__ . '/template.php');

$id = $_GET['id_recette'] ?? null;

if ($id) {
    $mep = $mysqlClient->prepare('SELECT * FROM recette WHERE id_recette = :id');
    $mep->execute([':id' => $id]);
    $recette = $mep->fetch(PDO::FETCH_ASSOC); ?>



    <?php
    if ($recette) { ?>
        <h2>La suppression de la recette <?= $recette['nom_recette'] ?> sera définitive !</h2>
        <form action="deleteRecipe.php" method="post">
            <input type="hidden" name="id_recette" value="<?= $recette['id_recette'] ?>" />

            <p>
                <input type="submit" name="submit" value="Oui supprimer !" />
            </p>
        </form>
<?php }
} ?>