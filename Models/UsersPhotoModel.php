<?php


class UsersPhotoModel extends ModelBase
{


    protected function getTable()
    {
        return 'users_photos';
        // TODO: Implement getTable() method.
    }

    public function addPhoto($photo ,$userId, $isMain = 0 ){

        $this->insert(['photo_name' => $photo['fileName'],'photo_extension' => $photo['fileExtension'], 'is_main' => $isMain, 'user_id' => $userId ])->execute();


    }

    public function getUserPhotos($userId){

        return $this->select()->where('user_id',$userId)->execute();
    }

    public function checkUserAvatar($id){

        $avatarExists = $this->select()->where('user_id',"$id", 'is_main', '1' )->execute();

        if (empty($avatarExists)){

            return true;
        } else {

            return false;
        }

    }

    public function changeAvatar($photo, $id){



        $this->update(['photo_name' => $photo['fileName'], 'photo_extension' => $photo['fileExtension']])->where('user_id',"$id", 'is_main', '1' )->execute();

    }

    public function getUserAvatar($id){

        return $this->select()->where('user_id',"$id", 'is_main', '1' )->execute();
    }
}