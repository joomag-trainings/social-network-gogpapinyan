<?php

namespace Controller;


use Model\UserModel;

class AuthenticationController
{
    public function actionLogin()
    {
        if (isset($_POST["login"])) {
            $username_log = $_POST["login_username"];
            $password_log = $_POST["login_password"];
            $user = UserModel::userExists($username_log, $password_log);
            if ($user) {
                $_SESSION["user_id"] = $user["user_id"];
                header("Location: index.php?page=user&action=timeline");
            } else {
                $loginError = "Wrong username or password";
                require "../view/welcome/signup.php";
            }
        }
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user_id']);
        header("Location: index.php?page=welcome&action=LoginSignup");
    }

}