<?php 
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny",
            "age" => 29
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit",
            "age" => 17
        ]
    ];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php foreach($users as $user) {?>
            <li>
                <?php  foreach($user as $key => $value ) { ?>
                
                    <?=$value ?>
                    
                <?php } ?>
                
                <?php 
                if($user['age']>18) { ?>
                        <?= "Majeur" ?>
                    <?php } else { ?>
                        <?= "Mineur" ?>
                <?php } ?>
            </li>
            <?php } ?>
        </ul>
    </body>
</html>