<?php

namespace Controller;

class WelcomeController
{
    public function actionStart()
    {
        if (isset($_SESSION["user_id"])){
            header("Location: index.php?page=user&action=timeline");
        }

        require "../view/welcome/start.php";

    }

    public function actionLoginSignup()
    {
        if (isset($_SESSION["user_id"])){
            header("Location: index.php?page=user&action=timeline");
        }
        require "../view/welcome/signup.php";
    }
}