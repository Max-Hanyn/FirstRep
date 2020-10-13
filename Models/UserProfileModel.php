<?php


class UserProfileModel extends ModelBase
{

    protected function getTable()
    {
        return 'users_pofiles';
    }

    public function getProfile($id)
    {

        return $this->select()->innerJoin('users', 'id', 'user_id')->where('users.id', $id)->execute();

    }
    public function search($search){
        $sql = ("SELECT DISTINCT users.email, users.id, users.role_id, users.verified, users.token, roles.name, users_photos.photo_name FROM `users` LEFT JOIN users_skills 
        ON users.id = users_skills.user_id JOIN roles ON users.role_id = roles.id JOIN users_photos ON users_photos.user_id = users.id AND users_photos.is_main = '1'
        WHERE users.email LIKE '%$search%'
        OR users.id LIKE '%$search%' 
        OR roles.name LIKE '%$search%' 
        OR users_skills.level LIKE '%$search%'
        OR users_skills.name LIKE '%$search%'
        OR users_skills.language LIKE '%$search%'
");
        $query = $this->link->prepare($sql);
        $query->execute();
        return $query->fetchall();

    }

    public function changeProfileData($id, $profileData){

         $this->update(['first_name' => $profileData['first_name'], 'second_name' => $profileData['second_name'], 'number' => $profileData['number'], 'adress' => $profileData['adress']])
            ->where('user_id', $id)
            ->execute();

    }


}
