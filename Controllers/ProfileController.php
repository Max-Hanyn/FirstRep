<?php

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->isLoggedOut();

    }

    public function index($id)
    {

        $profileModel = new UserProfileModel();
        $profileData = $profileModel->getProfile($id);
        $roleModel = new RolesModel();
        $role = $roleModel->getUserRole($id);
        $checkUser = new AuthService();
        $checkUser->checkUserProfile($id);
        $userPhotoModel = new UsersPhotoModel();
        $photos = $userPhotoModel->getUserPhotos($id);

        $config = parse_ini_file("./config/photos.ini");
        $path = $config['Path'];

        $avatarPhoto = $userPhotoModel->getUserAvatar($id);

        return $this->view('profile', ['pageData' => $profileData, 'avatar' => $avatarPhoto, 'path' => [$path]]);
    }

    public function logout()
    {

        $_SESSION['user'] = [];
        Route::redirect('login');
    }


    public function skills($id)
    {
        $userSkills = new UserSkillsModel();
        $skills = $userSkills->getUserSkills($id);


        return $this->view('profileSkills', ['skills' => [$skills], 'id' => [$id]]);

    }

    public function add()
    {

        $userPhotoModel = new UsersPhotoModel();
        $avatarExists = $userPhotoModel->checkUserAvatar($_SESSION['user']['id']);

        if ($avatarExists) {

            $photo = PhotoUpload::uploadPhoto();

            $userPhotoModel->addPhoto($photo, $_SESSION['user']['id'], '1');
            exit();

        } else {

            $currentUserAvatar = $userPhotoModel->getUserAvatar($_SESSION['user']['id']);
            PhotoUpload::deletePhoto($currentUserAvatar[0]['photo_name']);
            $photo = PhotoUpload::uploadPhoto();
            $userPhotoModel->changeAvatar($photo, $_SESSION['user']['id']);

        }

    }

    public function change($id)
    {

        $userProfileModel = new UserProfileModel();
        $profileData = $_POST;
        $userProfileModel->changeProfileData($id, $profileData);


    }

    public function changeEmail(){

        $email = $_POST['email'];
        $userModel = new UserModel();
        $userModel->checkUser($email);
        if (empty($userModel->checkUser($email))){


            $token = EmailVerifyService::createToken();
            $userModel->update(['new_email' => $email, 'token' => $token])->where('id',$_SESSION['user']['id'])->execute();
            EmailVerifyService::sendEmailChange($email, $token);

            return print_r(json_encode(['success' => true]));

        } else {

            return print_r(json_encode(['success' => false]));

        }

    }

    public function changePassword(){

        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newPasswordConfirm = $_POST['newPasswordConfirm'];

        if (!empty($oldPassword) && !empty($newPassword) && !empty($newPasswordConfirm)) {


            if ($newPassword == $newPasswordConfirm) {

                $userModel = new UserModel();
                $currentId = $_SESSION['user']['id'];
                $user = $userModel->select()->where('id', $currentId)->execute();

                if (md5(trim($oldPassword)) == $user[0]['password']) {

                    if (md5(trim($newPassword)) != $user[0]['password']) {

                        $userModel->update(['password' => md5(trim($newPassword))])->where('id', $currentId)->execute();

                        return print_r(json_encode(['success' => true,'msg' => 'changed password success']));

                    } else {

                        return print_r(json_encode(['success' => false,'msg' => 'password must be other than old password']));
                    }

                } else {

                    return print_r(json_encode(['success' => false,'msg' => 'old password wrong']));
                }

            } else {

                return print_r(json_encode(['success' => false,'msg' => 'new passwords different']));

            }

        }
    }

}