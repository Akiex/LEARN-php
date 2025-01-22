<?php

if (isset($_POST['color'])) {

    setcookie("couleur", $_POST['color']); 
    header("Location: index.php"); 
    exit;
}


if (isset($_COOKIE['couleur'])) {
    if ($_COOKIE['couleur'] === 'noir' || empty($_COOKIE['couleur'])) {
        $cssFile = 'default.css';
    } else if ($_COOKIE['couleur'] === 'rouge') {
        $cssFile = 'red.css';
    } else if ($_COOKIE['couleur'] === 'bleu') {
        $cssFile = 'blue.css';
    } else {
        $cssFile = 'default.css';
    }
} else {

    $cssFile = 'default.css';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir une couleur</title>

    <link rel="stylesheet" href="<?= $cssFile ?>" />
</head>
	<body>
		<h1>
			Sed sint laboriosam et blanditiis architecto cum aspernatur placeat. 
		</h1>
		<p>
			Lorem ipsum dolor sit amet. Nam error beatae sed vitae ipsa et libero officiis ut minus eaque hic porro quidem eum dolor aliquam? Et molestiae beatae in odit magni eos sapiente dignissimos! 
		</p>
		<h2>
			Est omnis quas sed voluptatem dicta eum vitae itaque! 
		</h2>
		<p>
			Ea ratione minima et nihil excepturi non itaque iure aut assumenda velit a quisquam amet et dolorem maxime et dicta illum. At architecto quia id voluptatem quisquam sit aspernatur sapiente quo aperiam sequi sit mollitia veritatis. Nam placeat distinctio ut soluta doloremque ab debitis quis? 
		</p>
		<h3>
			Aut magni consequuntur in omnis error aut internos molestias. 
		</h3>
		<p>
			Aut culpa recusandae sed ducimus velit vel omnis velit et beatae quae At galisum quam ut explicabo delectus in nisi suscipit. Ab distinctio dolorum in quam quam et provident rerum. 
		</p>
	</body>
</html>