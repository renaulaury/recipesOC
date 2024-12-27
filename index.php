<?php
session_start();
require_once __DIR__ . "/template.php";
require_once(__DIR__ . '/variable.php');
require_once(__DIR__ . '/function.php');
?>

<?php
//gestion des erreurs
try {
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=recettelily;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


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
    </article>
<?php endforeach; ?>

<?php



?>


</main>