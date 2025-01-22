<?php

$playerName = ''; 
if (isset($_GET['heroName'])) {
    $playerName = htmlspecialchars($_GET['heroName']); 
}


$template = 'homepage'; 

if (isset($_GET['route']) && $_GET['route'] === 'choice') {
    $template = 'choice'; 
}


require "templates/layout.phtml";
?>