<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Request;
use App\Core\Responses\Response;
use App\Models\Character;

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
        $characterImage = $this->request()->getFiles()['characterImage']['name'];

        $character = new Character();
        $character->setCharacterName($characterName);
        $character->setCharacterClass($characterClass);
        $character->setCharacterDescription($characterDescription);
        $character->setCharacterImage($characterImage);


        $character->save();

        return $this->redirect($this->url("character.charactersPage"));
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

        $newCharacter->save();

        return $this->redirect($this->url("character.charactersPage"));
    }
}