<?php
require_once __DIR__ . "/template.php";
?>

<?php
if (!isset($_SESSION['logged'])) { ?>
    <form action="submit_login.php" method="POST">
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
        </p>

        <p>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" />
        </p>

        <p>
            <input type="submit" name="submit" value="Valider" />
        </p>
    </form>

<?php } ?>