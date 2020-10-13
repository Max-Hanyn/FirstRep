<?php


class PasswordResetModel extends ModelBase

{

    protected function getTable()
    {
        return 'password_reset';

    }

    public function addReset($email,$token){

        $this->insert(['email' => $email, 'token' => $token])->execute();


    }
}