<!--
Créez un fichier index.php qui avant toute chose démarre la session.

Dans le fichier index.php vous allez créer un formulaire qui vous demande de 
choisir un pseudo, l’action de ce formulaire est un fichier nickname.php.

Dans un fichier nickname.php vous allez récupérer le pseudo envoyé par le 
formulaire, et le stocker.

Crééz un fichier welcome.php, dans ce fichier, récupérer le pseudo dans la 
session s’il existe et faites un echo "Bienvenue " . $pseudo si il existe et 
“Bienvenue invité” sinon.

Pour tester si votre exercice fonctionne, faites un run de welcome.php avant et 
après avoir utilisé le formulaire.

Dans un fichier logout.php, détruisez la session pour effacer toutes les variables de sessions.

Dans votre index.php rajoutez le code HTML suivant :

<a href="logout.php">Déconnexion</a>
-->

<?php

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de pseudo</title>
</head>
<body>
    <h1>Choisir un pseudo</h1>
    <form action="nickname.php" method="post">
        <label for="pseudo">Votre pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <input type="submit" value="Envoyer">
    </form>
    <a href="logout.php">Déconnexion</a>
</body>
</html>