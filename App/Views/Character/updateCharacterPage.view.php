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

    <style>
        /* Dal som sem inline css lebo neslo normalne css */
        html, body {
            background-color: #afc2c3;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .form-control, .form-control:focus {
            background-color: #fff;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .button-group .btn {
            padding: 0.5rem 2rem;
            font-size: 1rem;
        }

        .header-text h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 0.5rem;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($data !== null): ?>
    <form method="post" action="<?= $link->url('character.update')?>" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container p-4">
                    <div class="header-text mb-4 text-center">
                        <h2>CREATE CHARACTER</h2>
                    </div>
                    <input type="hidden" name="characterId" value="<?=htmlspecialchars($data->getId())?>">
                    <div class="mb-3">
                        <label for="characterName" class="form-label">Character Name:</label>
                        <div class="input-group">
                            <input id="characterName" name="characterName" type="text" class="form-control form-control-lg fs-6" placeholder="Name of the character"
                                value="<?=htmlspecialchars($data->getCharacterName())?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="characterClass" class="form-label">Character Class:</label>
                        <div class="input-group">
                            <input id="characterClass" name="characterClass" type="text" class="form-control form-control-lg fs-6" placeholder="Class of the character"
                                value="<?=htmlspecialchars($data->getCharacterClass())?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="characterDescription" class="form-label">Character Description:</label>
                        <div class="input-group">
                            <textarea class="form-control" name="characterDescription" placeholder="Character Description" id="characterDescription" style="height: 7em; resize: none;"><?=htmlspecialchars($data->getCharacterDescription())?></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="characterImage" class="form-label">Upload Photo:</label>
                        <input class="form-control" type="file" id="characterImage" name="characterImage" accept="image/jpeg, image/png">
                    </div>

                    <div class="button-group">
                        <button id="update_button" class="btn btn-dark">Edit</button>
                    </div>
                </div>
            </div>
    </form>
    <?php endif; ?>
    <script src="public/js/createCharacterPage_script.js"></script>
</div>
</body>
</html>