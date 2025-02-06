<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Permission;
use App\Models\profilepic;
use App\Core\Request;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\RedirectResponse;
use App\Models\Character;
use App\Models\User;

class ProfileController extends AControllerBase
{
    public function authorize($action)
    {
        switch($action) {

            case "save_photo":
            case "delete_photo":
            case "update_photo":
            case "create_photo":
            {
                if ($this->app->getAuth()->isLogged()) {
                    $permission = Permission::getAll("user_id=?", [$this->app->getAuth()->getLoggedUserId()]);
                    if (($permission[0]->getPermission() == "user")) {
                        return true;
                    }
                    return false;
                }
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
            'profilepic' => Profilepic::getAll()
        ]);// TODO: Implement index() method.
    }
    public function profile(): Response
    {
        return $this->html([
            'profilepic' => Profilepic::getAll()
        ]);// TODO: Implement index() method.
    }

    public function save_photo(): JsonResponse {
        $data = $this->request()->getRawBodyJSON();
        $username = $data->username;
        $photo = $data->photo;

        $profiles= Profilepic::getAll();
        foreach ($profiles as $profile) {
            if ($profile->getUserId() == $this->app->getAuth()->getLoggedUserId()) {
                if($profile->getPicture() != ""){
                    $this->update_photo($photo);
                    $output = 1;
                    return $this->json(["output" => $output]);
                }
            }
        }
        $this->create_photo($photo);
        $output = 2;

        return $this->json(["output" => $output]);
    }

    public function update_photo($photo) {
        $profiles = Profilepic::getAll();
        foreach ($profiles as $profile) {
            if($profile->getUserId() == $this->app->getAuth()->getLoggedUserId()) {
                $prf = Profilepic::getOne($profile->getId());
            }
        }
        $newUserId = $prf->getUserId();
        $prf->delete();

        $newProfile = new Profilepic();
        $newProfile->setUserId($newUserId);
        $newProfile->setPicture($photo);
        $newProfile->save();

    }

    public function create_photo($photo) {
        $user = User::getOne($this->app->getAuth()->getLoggedUserId());

        $profile = new Profilepic();
        $profile->setUserId($user->getId());
        $profile->setPicture($photo);
        $profile->save();
    }

    public function delete_photo(): JsonResponse {
        $profiles = Profilepic::getAll();
        foreach ($profiles as $profile) {
            if($profile->getUserId() == $this->app->getAuth()->getLoggedUserId()) {
                $prf = Profilepic::getOne($profile->getId());
            }
        }
        $prf->delete();
        $output = 1;
        return $this->json(["output" => $output]);

    }
}