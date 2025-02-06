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
            foreach ($data['characters'] as $character) : ?>
                <div class="item">
                    <div class="content">
                        <img src="<?= $character->getCharacterImage() ?>" alt="character">
                        <!--<img src="public/images/character<?= ($character->getId() % 11) + 1 ?>.jpg" alt="character">-->
                        <p>Name: <span class="item-name"><?= $character->getCharacterName()?></span></p>
                        <p>Class: <?= $character->getCharacterClass()?></p>
                        <p>Description: <?= $character->getCharacterDescription()?></p>
                        <p>Author: <?= $character->getAuthor()?></p>
                    </div>
                    <?php if ($character->getAuthor() == \App\Models\User::getOne($auth->getLoggedUserId())->getUsername()) { ?>
                        <div class="buttons">
                            <a href="<?= $link->url('character.updateCharacterPage', ['id' => $character->getId()]) ?>" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= $link->url("character.delete", ["id" => $character->getId()]) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this character?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach;
        ?>
    </div>
</div>
