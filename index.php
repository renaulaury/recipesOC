<?php
session_start();
require_once __DIR__ . "/template.php";
require_once(__DIR__ . '/variable.php');
require_once(__DIR__ . '/function.php');
?>

<main>
    <?php

    if (isset($_POST["submit"])) { //Si on a cliqué sur valider
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if ($email && $password) { //si email + mdp ok

            foreach ($users as $user) { //Verif user dans bdd
                if ($user['email'] == $email && $user['password'] == $password) {
                    $_SESSION['logged'] = $user['email'];
                    break;
                }
            }

            // Si l'utilisateur n'est pas trouvé
            if (!isset($_SESSION['logged'])) {
                echo "Vos identifiants sont incorrects.";
            }
        } else {
            echo "Veuillez vérifier vos identifiants.";
        }
    }


    if (isset($_SESSION['logged'])) {
        //t affiches les recettes
        foreach (getRecipes($recipes) as $recipe) : ?>
            <article>
                <h3><?= $recipe['title']; ?></h3>
                <div><?= $recipe['recipe']; ?></div>
                <i><?= displayAuthor($recipe['author'], $users); ?></i>
            </article>
    <?php endforeach;
    } else {
        echo "Connecte toi";
    }

    ?>


</main>