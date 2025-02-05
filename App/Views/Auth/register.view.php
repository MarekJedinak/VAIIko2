<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
/** @var \App\Models\User $user */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/createCharacterPage.css">
</head>
<body>
<div class="container">
    <div class="header-text">
        <h2>Register</h2>
    </div>
    <form class="form" method="post" action="<?= $link->url('auth.save_user') ?>" id="formId" enctype="multipart/form-data">
        <div class="text-center text-danger mb-3">
            <?= @$data['errors'][0] ?>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
        </div>
        <div class="text-center">
            <button type="submit" id="register" class="btn btn-dark">Register</button>
        </div>
    </form>
</div>
<script src="public/js/registerPage_script.js"></script>
</body>
</html>
