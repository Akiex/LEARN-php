<?php
if (isset($_POST['color'])) {

    setcookie("couleur", $_POST['color']); 
    header("Location: index.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir une couleur</title>
</head>
<body>

    <h1>Choisissez une couleur</h1>

    <form action="index.php" method="POST">
        <label for="color">Couleur :</label>
        <select name="color" id="color">
            <option value="noir">Noir</option>
            <option value="rouge">Rouge</option>
            <option value="bleu">Bleu</option>
        </select>
        <br><br>
        <input type="submit" value="Envoyer">
    </form>

</body>
</html>
