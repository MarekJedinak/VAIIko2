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
        <link rel="stylesheet" href="public/css/createCharacterPage.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <form method="post" action="<?= $link->url('character.save')?>" enctype="multipart/form-data">
        <div class="row border rounded-5 p-3 shadow box-area">

            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>CREATE CHARACTER</h2>
                    </div>
                    <div class="input-group mb-4">
                        <input id="characterName" name="characterName" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Name of the character">
                    </div>
                    <div class="input-group mb-4">
                        <input id="characterClass" name="characterClass" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Class of the character">
                    </div>
                    <div class="input-group">
                        <textarea class="form-control mb-3" name="characterDescription" placeholder="Characer Description" id="characterDescription" style="height: 7em; resize: none;"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label for="characterPhoto" class="form-label">Upload Photo:</label>
                        <input class="form-control" type="file" id="characterImage" name="characterImage" accept="image/jpeg, image/png">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                    </div>
                    <div class="input-group mb-3">
                        <button id="login_button" class="btn btn-lg btn-dark w-100 fs-6">Pridať</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <script src="public/js/createCharacterPage_script.js"></script>


    </body>
    </html><?php
