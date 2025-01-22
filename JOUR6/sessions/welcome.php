<?php

session_start();


if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
    echo "Bienvenue " . $pseudo;
} else {
    echo "Bienvenue invité";
}
?>
<br>
<a href="logout.php">Déconnexion</a>