<?php
require_once(__DIR__ . '/template.php');

$id = $_POST['id_recette'] ?? null;

if ($id) {
    $delete = $mysqlClient->prepare('DELETE FROM recette WHERE id_recette=:id');
    $delete->execute(['id' => $id]);

    header("Location:index.php");
}
