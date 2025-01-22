<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tester un Mot de passe</title>
</head>

<body>
  <h1>Bienvenue !</h1>
  <p>Testez votre MDP :</p>

  <form action="decrypt_password.php" method="POST">
    <label for="password">Mot de passe :</label>
    <input type="text" id="password" name="password" required>
    <br />
    <label for="hash">Mot de passe hash :</label>
    <input type="text" id="hash" name="hash" required>
    <br />
    <button type="submit">Envoyer</button>
  </form>
</body>

</html>