<?php
require_once(__DIR__ . '/template.php');

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recette ORDER BY id_recette DESC LIMIT 3';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();


//t affiches les recettes
foreach ($recipes as $recipe) : ?>
    <article>
        <h3><?= $recipe['nom_recette']; ?></h3>
        <div><?= $recipe['temps_preparation']; ?></div>
        <a href="addRecette.php">Ajouter une recette</a>
        <a href="viewUpdate.php?id_recette=<?= $recipe['id_recette']; ?>">Modifier une recette</a>
        <a href="viewDelete.php?id_recette=<?= $recipe['id_recette']; ?>">Supprimer une recette</a>
    </article>
<?php endforeach; ?>