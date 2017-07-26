<?php

namespace Controller;

use Database\Connection;
use Model\SearchModel;
use Model\SignupValidModel;
use Model\UploadModel;
use Model\UserModel;

class UserController extends AbstractController
{
    public function __construct() {
        parent::__construct();

    }
    public function actionSignup()
    {
        $validation = new SignupValidModel();
        $name = $validation->validName($_POST["reg_name"]);
        $surname = $validation->validSurname($_POST["reg_surname"]);
        $email = $validation->validEmail($_POST["reg_email"]);
        $username = $validation->validUsername($_POST["reg_username"]);
        $password = $validation->validPassword($_POST["reg_password"]);
        $gender = $validation->validGender($_POST["reg_gender"]);

        if ($name && $surname && $email && $username && $password && $gender) {
            $user = new UserModel($name, $surname, $email, $username, $password, $gender);
            UserModel::newUser($user);
            $signupOK = "You're now in Twime. Log in to continue";
            require "../view/welcome/signup.php";
        } else {
            require "../view/welcome/signup.php";
        }
    }

    public function actionSearch()
    {
        $dbConnection=Connection::getIntance();
        if (isset($_POST["key"])) {
            $key = $_POST["key"];
        } else {
            $key = $_GET["key"];
        }
        $query =    SearchModel::searchKey($key);
        $perpage = 10;
        if (!isset($_GET["start"])) {
            $start= 0;
        } else {
            $start=$_GET["start"];
        }
        $queryNew = "SELECT user_id,firstname, surname FROM users WHERE " . $query . " LIMIT $perpage OFFSET $start";
        $statement = $dbConnection->prepare($queryNew);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($users as $item) {
            echo "Name    ". $item["firstname"];
            echo "Surname   ". $item["surname"];
            $user_id1 = $_SESSION['user_id'];
            $user_id2 = $item["user_id"];
            echo "<a href='index.php?page=user&action=sendNotif&user_id1=$user_id1&user_id2=$user_id2'>Add to friends</a> <br>";
        }
        $start+=$perpage;

        if (count($users)!=0){
            echo "<a href='index.php?page=user&action=search&start=$start&key=$key'>NEXT PAGE</a>";
        }
        else {
            echo "There are no any results <a href='index.php?page=user&action=timeline'>Back to timeline</a>";
        }


    }

    public function actionTimeline()
    {
        require "../view/user/timeline.php";
    }

    public function actionProfile()
    {
        $user_id= $_SESSION["user_id"];
        $dbConnection =Connection::getIntance();
        $query = "SELECT * FROM users WHERE user_id=:id";
        $statement = $dbConnection->prepare($query);
        $statement->bindParam("id",$user_id);
        $statement->execute();
        $user=$statement->fetch(\PDO::FETCH_ASSOC);
        $firstname = $user["firstname"];
        $surname = $user["surname"];
        require "../view/user/profile.php";

    }

    public function actionPhotos()
    {
        require "../view/user/photos.php";
    }

    public function actionNewPhoto()
    {
        if (isset($_POST["add"])) {
            $uploadError = UploadModel::addPhoto($_FILES["newPhoto"]);
        }
        require "../view/user/photos.php";
    }

    public function actionSendNotif()
    {
        $dbConnection = Connection::getIntance();
        $query = "INSERT INTO friend_requests VALUES (NULL,:user_from,:user_to,0)";
        $statement = $dbConnection->prepare($query);
        $statement->bindParam(":user_from",$_GET["user_id1"]);
        $statement->bindParam(":user_to",$_GET["user_id2"]);
        $statement->execute();
    }

    public function actionAddFriend()
    {
        $dbConnection = Connection::getIntance();
        $query1="UPDATE friend_requests SET accepted=1 WHERE user_to=:user_id";
        $statement = $dbConnection->prepare($query1);
        $statement->bindParam(":user_id",$_SESSION["user_id"]);
        $statement->execute();
        $notif = $statement->fetch(\PDO::FETCH_ASSOC);

        $query2="INSERT INTO friends VALUES (:user_id1,:user_id2)";
        $statement=$dbConnection->prepare($query2);
        $statement->bindParam("user_id1",$notif["user_from"]);
        $statement->bindParam("user_id2",$notif["user_to"]);
    }
     public function actionFriendList()
     {
         $dbConnection = Connection::getIntance();
         $query = "SELECT * FROM friends WHERE user_id1=:id";
         $statement = $dbConnection->prepare($query);
         $statement->bindParam(":id", $_SESSION["user_id"]);
         $statement->execute();
         $friends = $statement->fetchAll(\PDO::FETCH_ASSOC);

         foreach ($friends as $item) {
             echo $item["Name"];
             echo $item["Surname"];
         }
     }

}
