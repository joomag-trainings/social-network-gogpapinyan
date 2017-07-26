<?php
/**
 * Created by PhpStorm.
 * User: gogli
 * Date: 24.07.17
 * Time: 9:03
 */

namespace Database;
use PDO;


class Connection
{
    private static $connection;

    /**
     * Connection constructor.
     */
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getIntance()
    {
        global $dbHost, $dbName, $dbUser, $dbPass;
        if (is_null(self::$connection)) {
            $connection = new PDO(
                "mysql:host=$dbHost;dbname=$dbName",
                $dbUser,
                $dbPass
            );
            self::$connection = $connection;
        }

        return self::$connection;
    }
}