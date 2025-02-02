<?php

namespace App\Controllers;




use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("admin.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    public function register(): Response {
        $sprava = $this->request()->getValue('errors');
        if ($sprava == null) {
            return $this->html();
        }else{
            return $this->html(['errors'=>$sprava]);
        }
    }

    public function save_user(): Response {
        $username = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');
        $confirm_password = $this->request()->getValue('confirm-password');


        if ($password == $confirm_password) {
            $user = new User();
            $user->setUsername($username);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $user->setPassword($password);
            $user->save();
            return $this->redirect($this->url("home.index"));

        }
            $formErrors = $this->formErrors();
            return $this->redirect($this->url("auth.register",
                    ['errors' => $formErrors]));

    }
    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }

    public function formErrors(): array {
        $errors = [];
        if ($this->request()->getValue('password') != $this->request()->getValue('confirm-password')) {
            array_push($errors, "Nezadali ste rovnake heslo");
        }
        return $errors;
    }
}
