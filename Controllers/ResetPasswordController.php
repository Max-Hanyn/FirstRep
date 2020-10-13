<?php


class ResetPasswordController extends Controller
{
    public function index(){

        return $this->view('passwordReset/resetView');


    }

    public function sendReset(){

        $email = $_POST['email'];

        if (!empty($email)){

            $userModel = new UserModel();
            $user = $userModel->select()->where('email',$email)->execute();
            if (!empty($user)){
                $resetPasswordModel = new PasswordResetModel();
                $token = EmailVerifyService::createToken();
                $resetPasswordModel->addReset($email,$token);
                PasswordResetService::sendEmailReset($email,$token);
                $_SESSION['msg'] = 'reset link send to your email';
                Route::redirect('reset');
            } else {

                $_SESSION['msg'] = 'no such email';
                Route::redirect('reset');
            }

        } else {
            $_SESSION['msg'] = 'please fill the email field';
            Route::redirect('reset');
        }



    }

    public function changePassword($token){
        $passwordReset = new PasswordResetModel();
        $email = $passwordReset->select()->where('token',$token)->execute();

        if (!empty($email)){


            if (isset($_POST['submit'])){

                $newPassword = $_POST['newPassword'];
                $newPasswordConfirm = $_POST['newPasswordConfirm'];


                if (!empty($newPassword) && !empty($newPasswordConfirm)){

                    if ($newPassword == $newPasswordConfirm){

                        $userModel = new UserModel();
                        $userModel->update(['password' => md5(trim($newPassword))])->where('email',$email[0]['email'])->execute();
                        $passwordReset->update(['token' => null])->where('email',$email[0]['email'])->execute();
                        Route::redirect('');

                    }

                }

            }


            return $this->view('passwordReset/makeNewPassword');

        } else {

            Route::redirect('forbidden');
        }


    }


}