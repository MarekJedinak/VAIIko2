<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
/** @var \App\Models\Character $character */
?>
<head>
    <meta charset="UTF-8">
    <title>Characters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/charactersPage.css">
</head>
<div class="telo">
    <h3 class="nadpis-characters">Characters</h3>
    <div class="list-of-characters">
        <?php
            $pocitadlo = 1;
            foreach ($data['characters'] as $character) : ?>
                <div class="item">
                    <img src="public/images/character<?= $pocitadlo ?>.jpg" alt="character">
                    <p>Name: <span class="item-name"><?= $character->getCharacterName()?></span></p>
                    <p>Class: <?= $character->getCharacterClass()?></p>
                    <p>Description: <?= $character->getCharacterDescription()?></p>
                    <p>Author: <?= $character->getAuthor()?></p>
                    <a href="<?= $link->url('character.delete', ['id' => $character->getId()]) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this character?')">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
            <?php
                $pocitadlo++;
                if($pocitadlo > 11) $pocitadlo = 1;
            endforeach;
        ?>
    </div>
</div>
