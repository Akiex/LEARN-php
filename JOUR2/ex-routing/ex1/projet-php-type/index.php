<?php
function routing() : string {
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
        
        if($route === 'about'){
            return 'about';
            
        } elseif ($route === 'contact') {
            return 'contact';
        };
    };
    
    return 'homepage';
        
};
$template = routing();

require "templates/layout.phtml";

?>