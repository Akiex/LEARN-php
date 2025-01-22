<?php 

if(isset($_POST['password'])){
    $password = $_POST['password'];


echo "$password <br>";

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

echo "$hashedpassword <br>";
};
?>