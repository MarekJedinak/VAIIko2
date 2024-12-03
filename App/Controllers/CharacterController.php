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
}