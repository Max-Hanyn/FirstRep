<?php


class UserModel extends ModelBase
{
    protected function getTable()
    {
        return "users";
        // TODO: Implement getTable() method.
    }

    /**
     * @param String $email
     * @return mixed
     */
    public function checkUser(string $email)
    {
        $sql = ("SELECT id FROM `{$this->getTable()}` WHERE ( `email` = :email )");
        $query = $this->link->prepare($sql);
        $query->execute([':email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC)['id'];

    }

    public function addUser($email, $password, $token)
    {

        $this->insert(['email' => $email, 'password' => $password, 'token' => $token])->execute();
        return $this->link->lastInsertID();


    }

    public function getUser($email, $password)
    {
        return $this->select()->where("email", $email, "password", $password)->execute();

    }

    public function allUsers()
    {
        return $this->select()->execute();
    }

    public function getUsersWith(){

        $sql = ("SELECT DISTINCT users.email, users.id, users.role_id, users.verified, users.token, roles.name, users_photos.photo_name FROM `users` LEFT JOIN users_skills 
        ON users.id = users_skills.user_id JOIN roles ON users.role_id = roles.id JOIN users_photos ON users_photos.user_id = users.id AND users_photos.is_main = '1'");
        $query = $this->link->prepare($sql);
        $query->execute();
        return $query->fetchall();
    }

}