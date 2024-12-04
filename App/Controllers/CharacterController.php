<?php

namespace App\Controllers;

use App\Core\AControllerBase;
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

        return $this->redirect($this->url("character.charactersPage"));    }
}