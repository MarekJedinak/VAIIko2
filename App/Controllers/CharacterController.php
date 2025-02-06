<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Request;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Character;
use App\Models\User;

class CharacterController extends AControllerBase
{

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

        $user = User::getOne($this->app->getAuth()->getLoggedUserId());

        $character = new Character();
        $character->setCharacterName($name);
        $character->setCharacterClass($class);
        $character->setCharacterDescription($description);
        $character->setCharacterImage($photo);
        $character->setAuthor($user->getUsername());
        $character->save();

        $output = 1;
        return $this->json(["output" => $output]);
    }

    public function delete() : Response
    {

        $id = (int) $this->request()->getValue('id');
        $character = Character::getOne($id);
        $character->delete();
        //$character->delete();

        return $this->redirect($this->url("character.charactersPage"));
    }

    public function update() : Response
    {
        $characterId = $this->request()->getValue('characterId');
        $characterName = $this->request()->getValue('characterName');
        $characterClass = $this->request()->getValue('characterClass');
        $characterDescription = $this->request()->getValue('characterDescription');
        $characterImage = $this->request()->getFiles()['characterImage']['name'];

        $deleteCharacter = Character::getOne($characterId);
        $deleteCharacter->delete();

        $newCharacter = new Character();
        $newCharacter->setId($characterId);
        $newCharacter->setCharacterName($characterName);
        $newCharacter->setCharacterClass($characterClass);
        $newCharacter->setCharacterDescription($characterDescription);
        $newCharacter->setCharacterImage($characterImage);

        $formErrors = $this->formErrors();
        if (count($formErrors)) {
            return $this->html(
                [
                    'character' => $characterId,
                    'errors' => $formErrors,
                ], 'createCharacterPage'
            );
        } else {
            $newCharacter->save();
            return new RedirectResponse($this->url("character.charactersPage"));
        }
    }

    public function formErrors(): array {
        $errors = [];
        if ($this->request()->getValue('characterName') == "") {
            $errors[] = "Pole character name musi byt vyplnene";
        }
        if ($this->request()->getValue('characterClass') == "") {
            $errors[] = "Pole character class musi byt vyplnene";
        }
        if ($this->request()->getValue('characterDescription') == "") {
            $errors[] = "Pole character description musi byt vyplnene";
        }
        $dlzka = strlen($this->request()->getValue('characterName'));
        if ($this->request()->getValue('characterName') != "" && $dlzka > 20) {
            $errors[] = "Pole character name musi mat menej ako 20 pismen";
        }
        return $errors;
    }
}