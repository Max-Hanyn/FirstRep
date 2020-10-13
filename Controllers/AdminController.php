<?php


class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $config = parse_ini_file("./config/photos.ini");
        $path = $config['Path'];
        $userModel = new UserModel();

        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $userModel->select('users.id,email,token,verified,name')->innerJoin('roles', 'id', 'role_id')->execute();
        $this->view('adminPage', ['users' => [$users], 'roles' => [$roles],'path' => [$path]]);

    }

    public function edit($id)
    {
        $userProfileModel = new UserProfileModel();
        $massage = [];
        if (isset($_POST['submit'])) {

            $firstName = $_POST['first_name'];
            $secondName = $_POST['second_name'];
            $number = $_POST['number'];
            $adress = $_POST['adress'];
            $userProfileModel->update(['first_name' => $firstName, 'second_name' => $secondName, 'number' => $number, 'adress' => $adress])->where('user_id', $id)->execute();
            $massage[] = ['edited' => true];

        }


        $userAvatar = new UsersPhotoModel();
        $avatar = $userAvatar->getUserAvatar($id);
        $user = $userProfileModel->getProfile($id);
        $photoConfig = PhotoUpload::config();

        $this->view('adminEdit', ['user' => $user, 'massage' => $massage,'avatar' => $avatar,'path' => [$photoConfig['Path']]]);
    }

    public function changeRole()
    {
        $userModel = new UserModel();
        $userModel->update(['role_id' => $_POST['role']])->where('id', $_POST['userId'])->execute();
        Route::redirect('admin');

    }

    public function get(){
        $config = parse_ini_file("./config/photos.ini");
        $path = $config['Path'];
        $usersModel = new UserModel();
        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $usersModel->getUsersWith();
        $userRole = $_SESSION['user']['roleId'];
        $response = ['roles' => $roles,'users' => $users, 'path' => $path,'role' => $userRole];
        return print_r(json_encode($response));
    }
    public function search(){

        $config = parse_ini_file("./config/photos.ini");
        $path = $config['Path'];
        $userModel = new UserProfileModel();
        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $userModel->search($_POST['search']);
        $response = ['roles' => $roles,'users' => $users, 'path' => $path];
        return print_r(json_encode($response));

    }
    public function photoChange($id){

        $userPhotoModel = new UsersPhotoModel();
        $currentUserAvatar = $userPhotoModel->getUserAvatar($id);
        PhotoUpload::deletePhoto($currentUserAvatar[0]['photo_name']);
        $photo = PhotoUpload::uploadPhoto();
        $userPhotoModel->changeAvatar($photo, $id);

    }
}