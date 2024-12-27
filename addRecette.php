<form action="addRecipe.php" method="post">
    <p>
        <label for="nom_recette">Nom de la recette :</label>
        <input type="text" name="nom_recette" />
    </p>
    <p>
        <label for="temps_preparation">Temps de préparation :</label>
        <input type="text" name="temps_preparation" />
    </p>

    <p><label for="instructions">Instructions :</label></p>
    <p>
        <textarea name="instructions"></textarea>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter" />
    </p>
</form>