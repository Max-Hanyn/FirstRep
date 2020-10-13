<?php


class EmailChangeController extends Controller
{

    public function changeEmail($token){


        $userModel = new UserModel();
        $user = $userModel->select()->where('token',$token)->execute();
        $id = $user[0]['id'];
        $userModel->update(['email' => $user[0]['new_email'], 'new_email' => null, 'token' => null])->where('id',$id)->execute();
        Route::redirect("/profile/$id");

    }
}