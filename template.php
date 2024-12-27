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
        <a href="addRecette.php">Ajouter une recette</a>

        <?php
        if (isset($_SESSION['logged'])) { ?>
            <a href="logout.php">Deconnexion</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>

    </nav>
</header>

<body>

</body>

<footer>Copyright</footer>

</html>