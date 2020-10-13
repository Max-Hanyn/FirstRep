<?php
session_start();

class Controller
{
    public function view($viewName, array $data = null)
    {
        if ($data) {

            foreach ($data as $variable) {

                $key = array_search($variable, $data);
                $$key = $variable[0];

            }
        }


        include "Views/$viewName.php";
    }

    public function checkUserRole($checkRole)
    {
        if (!empty($_SESSION['user']['role'])) {
            foreach ($_SESSION['user']['role'] as $role) {
                if ($role == $checkRole) {
                    return true;
                }
            }

        }
        Route::redirect('forbidden');
    }

    public function isLoggedOut()
    {
        if ($_SESSION['user']['roleId'] == RolesModel::ROLE_GUEST_ID) {

            Route::redirect('login');
        }
    }

    public function isLoggedIn()
    {
        if (Roles::checkRole(RolesModel::ROLE_USER_ID)) {
            $id = $_SESSION['user']['id'];
            Route::redirect("profile/$id");
        }
    }

    public function isGuest(){

        if (is_null($_SESSION['user']['id'])){

            Route::redirect("forbidden");

        }

    }

}