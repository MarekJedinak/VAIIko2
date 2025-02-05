<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var int $fotka */
/** @var Array $data */
/** @var \App\Models\User $user */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<header>
    <div class="hlavicka">
        <img src="public/images/hlavickaPozadie.png" alt="Hlavicka" >
        <h1>ScrambledEgg</h1>
    </div>
</header>
<nav>
    <ul>
        <li><button type="button" class="characters-btn" onclick="window.location.href='<?= $link->url("home.index") ?>'">HOME</button></li>
        <li><button type="button" class="characters-btn" onclick="window.location.href='<?= $link->url("character.charactersPage") ?>'">CHARACTERS</button></li>
        <li><button type="button" class="characters-btn" onclick="window.location.href='<?= $link->url("character.createCharacterPage") ?>'">CREATE CHARACTER</button></li>

        <?php
        $fotka = 0;
        if($auth->isLogged()) {
            $users = \App\Models\User::getAll();
            foreach ($users as $user) {
                if ($user->getId() == $auth->getLoggedUserId()){
                    $fotka = $user->getId();
                }
            }
        }
        ?>
        <p><?= $fotka ?></p>
        <li class="profile-container">
            <img src="public/images/profile-default-icon.png"
                 alt="Profil"
                 class="profile-btn"
                 id="profileBtn">

            <div class="profile-dropdown" id="profileDropdown">
                <a href='<?= $link->url("auth.register") ?>'>Register</a>
                <a href='<?= $link->url("auth.login") ?>'>Login</a>
            </div>
        </li>
    </ul>
</nav>


<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

<script src="public/js/script.js"></script>

</body>
</html>
