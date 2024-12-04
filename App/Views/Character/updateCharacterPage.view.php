<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
/** @var \App\Models\Character $character */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Create Character</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/createCharacterPage.css">
</head>
<body>
<div class="container">
    <?php if ($data !== null): ?>
    <form method="post" action="<?= $link->url('character.update') ?>" id="formId" enctype="multipart/form-data">
        <h2 class="text-center mb-4">EDIT CHARACTER</h2>
        <input type="hidden" name="characterId" value="<?=htmlspecialchars($data->getId())?>">
        <div class="mb-3">
            <label for="characterName" class="form-label">Name:</label>
            <input id="characterName" name="characterName" type="text" class="form-control form-control-lg fs-6" placeholder="Name of the character"
                   value="<?=htmlspecialchars($data->getCharacterName())?>">
        </div>
        <div class="mb-3">
            <label for="characterClass" class="form-label">Class:</label>
            <input id="characterClass" name="characterClass" type="text" class="form-control form-control-lg fs-6" placeholder="Class of the character"
                   value="<?=htmlspecialchars($data->getCharacterClass())?>">
        </div>
        <div class="mb-3">
            <label for="characterDescription" class="form-label">Description:</label>
            <textarea class="form-control" name="characterDescription" placeholder="Character Description" id="characterDescription" style="height: 7em; resize: none;"><?=htmlspecialchars($data->getCharacterDescription())?></textarea>
        </div>
        <div class="mb-3">
            <label for="characterImage" class="form-label">Upload Photo:</label>
            <input class="form-control" type="file" id="characterImage" name="characterImage" accept="image/jpeg, image/png">
        </div>
        <div class="text-center">
            <button id="createCharacter" class="btn btn-dark">Edit</button>
        </div>
    </form>
    <?php endif; ?>
</div>
<script src="public/js/createCharacterPage_script.js"></script>
</body>
</html>

