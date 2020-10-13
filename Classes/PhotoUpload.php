<?php


class PhotoUpload
{

    public static function config(){

        return parse_ini_file("./config/photos.ini");
    }

    public static function uploadPhoto(){



        $configurations = self::config();

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));



        if (in_array($fileActualExt, $configurations['allowedExtensions'])){

            if ($fileError == 0){

                if($fileSize < $configurations['maxSize']){

                    $fileNewName = uniqid('',true).'.'.$fileActualExt;


                    if (move_uploaded_file($fileTmpName,  $configurations['filePath'].$fileNewName)) {

                        echo $configurations['Path'].$fileNewName;
                        return ['fileName' => $fileNewName, 'fileExtension' => $fileActualExt];
                    } else {
                        echo "Ups...";
                        return;
                    }

                }else {

                    echo 'to big file';
                    return;
                }
            }else {
                echo 'error'. $fileError;
                return;
            }

        }else {
            echo 'extension not allowed';
            return;
        }

    }

    public static function deletePhoto($photoName){
        $configurations = self::config();
        if ($photoName != $configurations['photoName']){

            $path = $configurations['filePath'];

            unlink($path.$photoName);
        }


    }

}