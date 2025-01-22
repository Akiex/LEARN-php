<?php
session_start();
require "../connexion.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

  $query = $db->prepare('SELECT * FROM users WHERE email= :email');

  $parameters = [
    'email' => $_POST['email'],
  ];
  $query->execute($parameters);
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if ($result === false) {

    echo <<<HTML
      <h1>Email incorrect </h1>
      <br/>
      <a href ="../index.php?route=home" >Back to home</a>
    HTML;
  } elseif (password_verify($_POST["password"], $result["password"])) {

    $_SESSION['user'] = [
      'first_name' => $result["first_name"],
      'last_name' => $result["last_name"],
    ];
    header('Location: ../index.php?route=home');
  } else {

    echo <<<HTML
      <h1>Mot de passe incorrect </h1>
      <br/>
      <a href ="../index.php?route=home" >Back to home</a>
    HTML;
  }
}
?>