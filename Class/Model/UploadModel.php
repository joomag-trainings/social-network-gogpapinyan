<?php
/**
 * Created by PhpStorm.
 * User: gogli
 * Date: 26.07.17
 * Time: 0:32
 */

namespace Model;


class UploadModel
{

    public static function addPhoto($file)
    {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

            $check = getimagesize($file["tmp_name"]);
            if($check == false) {
                $uploadError = "File is not an image.";
                return $uploadError;
            }

        if ($file["size"] > 500000) {
            $uploadError="Sorry, your file is too large.";
            return $uploadError;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $uploadError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return $uploadError;
        }

            if (!move_uploaded_file($file["tmp_name"], $target_file)) {

            $uploadError = "Sorry, there was an error uploading your file.";
            return $uploadError;
            }
            return true;
    }

}