<?php
$mail = htmlspecialchars($_POST['mail']);
$password = htmlspecialchars($_POST['password']);

echo "mail: $mail | mot de passe: $password";

?>