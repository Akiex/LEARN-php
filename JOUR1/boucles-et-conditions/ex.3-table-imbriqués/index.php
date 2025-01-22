<?php
$users = [
    [
        "firstName" => "Hugues",
        "lastName" => "Froger"
    ],
    [
        "firstName" => "Mari",
        "lastName" => "Doucet"
    ]
];

foreach($users as $user)
{
    foreach($user as $key => $value)
    {
        echo "My $key  is $value <br>";
    };
};

?>