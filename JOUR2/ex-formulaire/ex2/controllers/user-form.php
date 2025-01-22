<?php
$mail = htmlspecialchars($_POST['mail'] ?? '');
$password = htmlspecialchars($_POST['password'] ?? '');
$passwordCheck = htmlspecialchars($_POST['passwordCheck'] ?? '');
$newsLetter = isset($_POST['newsLetter']) ? 'oui' : 'non';


$confirmation = '';

if($password === $passwordCheck){
    $confirmation = "Vérification des mots de passe : OK";
   
} else {
    $confirmation = "Vérification des mots de passe : NOK";
    
};


    echo "mail: $mail | Mot de passe: $confirmation | NewsLetter : $newsLetter";






?>