<?php

require_once(__DIR__ . '/template.php');

$id = $_GET['id_recette'] ?? null;

if ($id) {
    $mep = $mysqlClient->prepare('SELECT * FROM recette WHERE id_recette = :id');
    $mep->execute([':id' => $id]);
    $recette = $mep->fetch(PDO::FETCH_ASSOC);


    if ($recette) { ?>
        <h2>Mettre à jour <?= $recette['nom_recette'] ?></h2>

        <form action="updateRecipe.php" method="post">
            <input type="hidden" name="id_recette" value="<?= $recette['id_recette'] ?>" />

            <p>
                <label for="nom_recette">Nom de la recette :</label>
                <input type="text" name="nom_recette" value="<?= $recette['nom_recette'] ?>" />
            </p>
            <p>
                <label for="temps_preparation">Temps de préparation :</label>
                <input type="text" name="temps_preparation" value="<?= $recette['temps_preparation'] ?>" />
            </p>

            <p><label for="instructions">Instructions :</label></p>
            <p>
                <textarea name="instructions"><?= $recette['instructions'] ?></textarea>
            </p>

            <p>
                <input type="submit" name="submit" value="Mettre à jour" />
            </p>
        </form> <?php
            }
        } else {
            echo "Ya pas de recette affiliée.";
        }
