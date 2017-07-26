<?php
/**
 * Created by PhpStorm.
 * User: gogli
 * Date: 24.07.17
 * Time: 20:35
 */

namespace Model;


class SearchModel
{
    public static function searchKey($key)
    {

        $dbConnection = \Database\Connection::getIntance();
        $keys = explode(" ", $key);
        if (count($keys) == 1) {
            $query = "`firstname` LIKE '%$keys[0]%' OR `surname` LIKE '%$keys[0]%'";
        } else {
            $query = "(`firstname`   LIKE '%$keys[0]%' AND `surname` LIKE '%$keys[1]%') OR (`firstname` LIKE '%$keys[1]%' AND `surname` LIKE '%$keys[0]%')";
        }
        return $query;
    }
}