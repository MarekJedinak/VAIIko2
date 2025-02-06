<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Request;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Character;
use App\Models\Permission;
use App\Models\User;

class CharacterController extends AControllerBase
{
    public function authorize($action)
    {
        switch($action) {

            case "save_character": {
                $idcko = 1;
                $data = $this->request()->getRawBodyJSON();
                if ($data != null) {
                    $idcko = $data->char_id;
                }
                if ($idcko == "") {
                    return true;
                }
                $permissions = Permission::getAll();
                $admin = 0;
                foreach ($permissions as $permission) {
                    if ($permission->getPermission() == "admin"){
                        $admin = $permission->getUserId();
                    }
                }

                $cha = Character::getOne($idcko);
                if ($this->app->getAuth()->getLoggedUserId() == $cha->getUserId() ||
                    $this->app->getAuth()->getLoggedUserId() == $admin) {
                    return true;
                }
                return false;
            }
            case "delete":
            {
                //$data = $this->request()->getRawBodyJSON();

                $char_id = $this->request()->getValue("id");
                $cha = Character::getOne($char_id);
                $permissions = Permission::getAll();
                $admin = 0;
                foreach ($permissions as $permission) {
                    if ($permission->getPermission() == "admin"){
                        $admin = $permission->getUserId();
                    }
                }
                if ($this->app->getAuth()->getLoggedUserId() == $cha->getUserId() ||
                    $this->app->getAuth()->getLoggedUserId() == $admin) {
                    return true;
                }
                return false;
            }
            default:
            {
                return true;
            }
        }
    }
    public function index(): Response
    {
        return $this->html([
            'characters' => Character::getAll()
        ]);// TODO: Implement index() method.
    }
    public function charactersPage(): Response
    {
        return $this->html([
            'characters' => Character::getAll()
        ]);// TODO: Implement index() method.
    }
    public function createCharacterPage(): Response
    {
        return $this->html();// TODO: Implement index() method.
    }
    public function updateCharacterPage(): Response
    {
        $id = $this->request()->getValue('id');
        $character = Character::getOne($id);
        return $this->html(data: $character);// TODO: Implement index() method.
    }

    public function save() : Response
    {
        $characterName = $this->request()->getValue('characterName');
        $characterClass = $this->request()->getValue('characterClass');
        $characterDescription = $this->request()->getValue('characterDescription');
        $characterImage = $this->request()->getFiles()['characterImage'];
        //$characterImage = $this->request()->getFiles('characterImage');
        $characterImage1 = $this->request()->getValue('characterImage');


        $character = new Character();
        $character->setCharacterName($characterName);
        $character->setCharacterClass($characterClass);
        $character->setCharacterDescription($characterDescription);

        $characterImage = "nieco";

        $character->setCharacterImage($characterImage);

        $formErrors = $this->formErrors();
        if (count($formErrors)) {
            return $this->html(
                [
                    'character' => $character,
                    'errors' => $formErrors,
                ], 'createCharacterPage'
            );
        } else {
            $character->save();
            return new RedirectResponse($this->url("character.charactersPage"));
        }
    }

    public function save_character(): JsonResponse {
        $data = $this->request()->getRawBodyJSON();
        $name = $data->name;
        $class = $data->class;
        $description = $data->description;
        $photo = $data->photo;
        $charId = $data->char_id;
        $author = "";
        $userId = 0;
        $character = null;
        $user = User::getOne($this->app->getAuth()->getLoggedUserId());

        if($charId == null) {
            $character = new Character();
            $character->setAuthor($user->getUsername());
            $character->setUserId($user->getId());
        } else {
            $character = Character::getOne($charId);
            $author = Character::getOne($charId)->getAuthor();
            $userId = Character::getOne($charId)->getUserId();
        }

        $errs = $this->formErrors();

        $character->setCharacterName($name);
        $character->setCharacterClass($class);
        $character->setCharacterDescription($description);
        if ($photo) {
            $character->setCharacterImage($photo);
        } else {
            $errs[] = "Character neobsahuje obrazok";
        }
        $character->setAuthor($author);
        $character->setUserId($userId);
        if (!$errs) {
            $character->save();
            $output = 1;
        } else {
            $output = 2;
        }
        return $this->json(["output" => $output, "errors" => $errs]);
    }

    public function delete() : Response
    {

        $id = (int) $this->request()->getValue('id');
        $character = Character::getOne($id);
        $character->delete();
        //$character->delete();

        return $this->redirect($this->url("character.charactersPage"));
    }

    /*public function update() : JsonResponse
    {
        $characterId = $this->request()->getValue('characterId');
        $characterName = $this->request()->getValue('characterName');
        $characterClass = $this->request()->getValue('characterClass');
        $characterDescription = $this->request()->getValue('characterDescription');
        $characterImage = $this->request()->getFiles()['characterImage']['name'];

        $deleteCharacter = Character::getOne($characterId);
        $characterAuthor = $deleteCharacter->getAuthor();
        $characterUserId = $deleteCharacter->getUserId();

        $deleteCharacter->delete();

        $newCharacter = new Character();
        $newCharacter->setId($characterId);
        $newCharacter->setCharacterName($characterName);
        $newCharacter->setCharacterClass($characterClass);
        $newCharacter->setCharacterDescription($characterDescription);
        $newCharacter->setCharacterImage($characterImage);
        $newCharacter->setAuthor($characterAuthor);
        $newCharacter->setUserId($characterUserId);

        if ($this->formErrors()) {
            $newCharacter->save();
        }
        $output = 1;
        return $this->json(["output" => $output]);

    }*/

    public function formErrors(): array {
        $errors = [];
        $data = $this->request()->getRawBodyJSON();
        if ($data->name == "") {
            $errors[] = "Pole character name musi byt vyplnene";
        }
        if ($data->class == "") {
            $errors[] = "Pole character class musi byt vyplnene";
        }
        if ($data->description == "") {
            $errors[] = "Pole character description musi byt vyplnene";
        }
        $dlzka = strlen($data->name);
        if ($dlzka != "" && $dlzka > 20) {
            $errors[] = "Pole character name musi mat menej ako 20 pismen";
        }
        $dlzka = strlen($data->class);
        if ($dlzka != "" && $dlzka > 20) {
            $errors[] = "Pole character class musi mat menej ako 20 pismen";
        }
        return $errors;
    }
}