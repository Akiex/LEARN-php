<?php
function routing() : string {
   
    if (isset($_GET['route'])) {
        $route = $_GET['route'];

        if ($route === 'choice') {
            return 'choice'; 
        }
    }
    return 'homepage'; 
}

$template = routing();
?>