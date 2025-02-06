<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\character;
use App\Models\Permission;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        $permission = Permission::getOne($this->app->getAuth()->getLoggedUserId());
        if ($permission->getPermission() == "admin") {
            return true;
        }
        return false;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }
    public function table(): Response {
        return $this->html([
            'characters' => Character::getAll()
        ]);
    }
}
