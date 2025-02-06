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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Table</title>
    <link rel="stylesheet" href="public/css/table.css">
</head>
<body>

<div class="table-container">
    <table class="character-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Character Name</th>
                <th>Class</th>
                <th>Description</th>
                <th>Image</th>
                <th>Author</th>
                <th>User ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data['characters'] as $character) { ?>
                <tr>
                    <td><?=$character->getId()?></td>
                    <td><?=$character->getCharacterName()?></td>
                    <td><?=$character->getCharacterClass()?></td>
                    <td><?=$character->getCharacterDescription()?></td>
                    <td><?=$character->getCharacterImage()?></td>
                    <td><?=$character->getAuthor()?></td>
                    <td><?=$character->getUserId()?></td>
                    <td>
                        <div class="buttons">
                            <a href="<?= $link->url('character.updateCharacterPage', ['id' => $character->getId()]) ?>" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= $link->url("character.delete", ["id" => $character->getId()]) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this character?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                <?php }
            ?>

        </tbody>
    </table>
</div>

</body>
</html>
