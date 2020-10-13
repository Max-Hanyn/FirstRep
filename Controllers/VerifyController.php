<?php

class VerifyController extends Controller
{





    public function index()
    {

        $this->isGuest();
        $this->view('verify');
    }

    public function verify($token)
    {

        $user = new UserModel();
        $userData = $user->select()->where('token', $token)->execute();

        if ($userData) {


            $user->update(['verified' => '1', 'token' => "null"])->where('token', $token)->execute();
            $userId = $userData[0]['id'];

            if ($_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID) {
                Route::redirect("admin");
            }
            $_SESSION['user']['roleId'] = RolesModel::ROLE_USER_ID;
            Route::redirect("profile/$userId");

        }

    }

    public function resent()
    {
        $user = new UserModel();
        $id = $_SESSION['user']['id'];
        $userData = $user->select()->where('id', $id)->execute();
        $email = $userData[0]['email'];
        $token = $userData[0]['token'];

        EmailVerifyService::sendMailVerification($email, $token);
        Route::redirect('verify');

    }
}