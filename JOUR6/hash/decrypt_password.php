<?php
$password = $_POST["password"];
$hash = $_POST["hash"];

$isPasswordCorrect = password_verify($password, $hash);

if ($isPasswordCorrect === true) {
  echo "C'est bon !";
} else {
  echo "C'est PAS bon !";
}

?>