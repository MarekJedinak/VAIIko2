<?php ?>
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
<form class="form" method="POST" action="" enctype="multipart/form-data">
    <h3>Create Character</h3>
    <div class="mb-3">
        <label for="characterName" class="form-label">Name:</label>
        <input type="text" class="form-control" id="characterName" name="characterName" placeholder="Name of the character">
    </div>
    <div class="mb-3">
        <label for="characterClass" class="form-label">Class:</label>
        <input type="text" class="form-control" id="characterClass" name="characterClass" placeholder="Character class">
    </div>
    <div class="mb-3">
        <label for="characterDescription" class="form-label">Character Description:</label>
        <textarea class="form-control" id="characterDescription" name="characterDescription" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="characterPhoto" class="form-label">Upload Photo:</label>
        <input class="form-control" type="file" id="characterPhoto" name="characterPhoto">
    </div>
    <button type="submit" class="btn btn-primary">Vytvoriť postavu</button>
</form>
</body>
</html>