<?php
session_start();
require_once __DIR__ . "/template.php";
require_once(__DIR__ . '/variable.php');
require_once(__DIR__ . '/function.php');
?>

<main>
    <?php
    session_unset();
    session_destroy();

    redirectToUrl("index.php");
    ?>
</main>