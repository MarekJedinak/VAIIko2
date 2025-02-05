<?php

//$layout = 'auth';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var string $contentHTML */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/createCharacterPage.css">
</head>

<body>
<div class="container">
    <div class="header-text text-center">
        <h2>Prihlásenie</h2>
    </div>
    <form class="form-signin" method="post" action="<?= $link->url("login") ?>">
        <div class="text-center text-danger mb-3">
            <?= @$data['message'] ?>
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Login:</label>
            <input name="login" type="text" id="login" class="form-control" placeholder="Login" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="text-center">
            <button class="btn btn-dark" type="submit" name="submit">Prihlásiť</button>
        </div>
    </form>
</div>
</body>
</html>
