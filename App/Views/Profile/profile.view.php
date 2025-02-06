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
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/profile.css">
</head>
<body>

<div class="container">
    <div class="profile-header">
        <div class="profile-pic">
            <?php
                $photo = "public/images/profile-default-icon.png";
                if ($auth->isLogged()) {
                    $profiles = \App\Models\Profilepic::getAll();
                    foreach ($profiles as $profile) {
                        if ($profile->getUserId() == $auth->getLoggedUserId()) {
                            $newPhoto = $profile->getPicture();
                            if ($newPhoto != $photo) {
                                $photo = $newPhoto;
                            }
                        }
                    }
                }

            ?>
            <div class="photo-container">
                <img id="profileImage" src="<?=$photo?>" alt="Profilová fotka">
                <button class="edit-btn" id="delete-photo-btn" onclick="enableEdit('username')">Delete Photo</button>
            </div>
            <input type="file" id="uploadImage" accept="image/*">
        </div>
        <div class="profile-info">
            <div class="form-group">
                <label for="username">Username:</label>
                <?php
                $user = \App\Models\User::getOne($auth->getLoggedUserId());
                ?>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($user->getUsername()) ?>" disabled>
                <button class="edit-btn" id="username-btn" onclick="enableEdit('username')">Edit</button>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="********" disabled>
                <button class="edit-btn" id="password-btn" onclick="enableEdit('password')">Edit</button>
            </div>
        </div>
        <div class="button-group">
            <button type="submit" id="save-changes" class="btn btn-dark">Save Changes</button>
        </div>
    </div>
    <div class="create-character">
        <button type="button" class="create-character-btn" onclick="window.location.href='<?= $link->url("character.createCharacterPage") ?>'">CREATE CHARACTER</button>
        <p>Create a new character and start your adventure!</p>
    </div>

<script src="public/js/profile_script.js"></script>

</div>

</body>
</html>
