<?php
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
<form class="form" method="POST" action="" enctype="multipart/form-data">
    <h3>Login</h3>
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username"
               placeholder="Username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="submit" id="login" class="btn btn-primary">Login</button>
</form>

<script src="public/js/loginPage_script.js"></script>

</body>
</html>