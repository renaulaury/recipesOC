<?php
require_once(__DIR__ . '/template.php');

$id = $_GET['id_recette'] ?? null;

if ($id) {
    $mep = $mysqlClient->query('DELETE FROM recipes WHERE recipe_id=:id')

}