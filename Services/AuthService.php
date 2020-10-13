<?php
session_start();

class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function createNewUser($firstName, $secondName, $email, $password)
    {

        $photoConfig = parse_ini_file("./config/photos.ini");
        $userPhotoModel = new UsersPhotoModel();
        $userProfileMode = new UserProfileModel();
        $newUser = new UserModel();
        $token = EmailVerifyService::createToken();
        EmailVerifyService::sendMailVerification($email, $token);
        $id = $newUser->addUser($email, $password, $token);
        $userProfileMode->insert(['first_name' => $firstName, 'second_name' => $secondName, 'user_id' => $id])->execute();
        $userPhotoModel->addPhoto(['fileName' => $photoConfig['photoName'], 'fileExtension' => $photoConfig['photoExtension']], $id, '1');

        return $id;

    }

    public function checkUserProfile($profileId)
    {

        if ($_SESSION['user']['id'] == $profileId || $_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID) {
            return true;
        } else {
            Route::redirect("forbidden");
        }
    }

    public static function currentUser($id)
    {
        if ($_SESSION['user']['id'] == $id || $_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID) {
            return true;
        } else {
            return false;
        }
    }
    public static function hasRole($role){

        if ( $_SESSION['user']['roleId'] == $role){

            return true;

        } else {
            return false;
        }
    }


}