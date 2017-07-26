<?php

namespace Controller;

abstract class AbstractController
{
      public function __construct()
      {
          if (!isset($_SESSION["user_id"])) {
              header ("Location: index.php?page=welcome&action=LoginSignup");
          }
      }
}