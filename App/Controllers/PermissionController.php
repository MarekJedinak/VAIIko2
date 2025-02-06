<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Permission;
use App\Models\Profilepic;

class PermissionController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html([
            'permissions' => Permission::getAll()
        ]);// TODO: Implement index() method.
    }

}