<?php
session_start();
require_once(__DIR__ . '/variable.php');
require_once(__DIR__ . '/function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIte de Recette</title>
</head>

<header>
    <nav>
        <a href="index.php">Accueil</a>


        <?php
        if (isset($_SESSION['logged'])) { ?>
            <a href="logout.php">Deconnexion</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>

    </nav>
</header>

<body>
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
    ?>
</body>

<footer>Copyright</footer>

</html>