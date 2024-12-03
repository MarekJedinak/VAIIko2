
<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
/** @var \App\Models\Character $character */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hlavna Stranka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/homePage.css">
</head>
<body>

<div class="telo">
    <div class="popis-stranky">
        <p>Welcome to <span>ScrambledEgg</span></p>
        <p>This is a webpage created by a fan of DND and character creation.
            Use it to share your creations with other members of the community.</p>
    </div>
    <div class="sekcia-COTD">
        <h2>Character Of The Day:</h2>
        <div class="character-of-the-day">
            <h2>Lyra Moonshadow</h2>
            <img src="public/images/character6.jpg" alt="Character Image" >
            <div class="character-of-the-day-description">
                <p>Class: Sorcerer</p>
                <p>Description: Mystery, driven, natural talent</p>
                <p>Author: QuantumWanderer</p>
                <?php foreach ($data['characters'] as $character) : ?>
                    <?= $character->getCharacterName() ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>


</div>
</body>
</html>