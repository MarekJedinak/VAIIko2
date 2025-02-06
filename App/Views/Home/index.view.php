<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
/** @var \App\Models\character $character */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hlavna Stranka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/homePage.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="telo">
    <div class="sekcia-COTD">
        <h2>Character Of The Day:</h2>
        <div class="character-of-the-day">
            <h2>Lyra Moonshadow</h2>
            <img src="public/images/character6.jpg" alt="Character Image" >
            <div class="character-of-the-day-description">
                <p>Class: Sorcerer</p>
                <p>Description: Mystery, driven, natural talent</p>
                <p>Author: QuantumWanderer</p>
            </div>
        </div>
    </div>

    <div class="popis-stranky">
        <p>Welcome to <span>ScrambledEgg</span></p>
        <p>This is a webpage created by a fan of DND and character creation.
            Use it to share your creations with other members of the community.</p>
    </div>

    <div class="card bg-white w-96 h-50 mt-12 shadow-2xl p-5 bg-cover bg-center rounded-xl relative overflow-hidden">

        <div class="absolute inset-0  bg-opacity-40 backdrop-blur-lg"
             style="background-image: url('public/images/weather.jpg'); background-size: 400px 325px"></div>

        <div class="relative z-10 text-black text-center">
            <h2 class=" text-2xl font-bold">🌡 Weather</h2>
            <p class="mt-2"><strong>City:</strong> <span id="city1">Načítavam...</span></p>
            <p><strong>Lat:</strong> <span id="lat">-</span></p>
            <p><strong>Long:</strong> <span id="long">-</span></p>
            <p class="text-lg font-semibold mt-2"><strong>Temperature:</strong> <span id="temperature">--</span>°C</p>

            <button class="btn btn-primary mt-4 w-full text-lg font-semibold" onclick="getlocation()">📍 Skontroluj počasie</button>
        </div>
    </div>



</div>
</body>
</html>