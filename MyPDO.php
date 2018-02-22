<?php
/**
 * Created by PhpStorm.
 * User: jeanb
 * Date: 22/02/2018
 * Time: 15:11
 */

class MyPDO extends  PDO
{
    const SERVER_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE_NAME = "partiel";

    /**
     * @param $username Username to search
     * @param $password Password to search
     * @return bool true if the user exists, false otherwise
     */
    public function checkUser($username, $password){
        $query = "SELECT id FROM `users` WHERE username='".$username."' and password='".$password."'";
        $req = $this->query($query);
        var_dump($req);
        if($req->rowCount() == 0){ // si aucune ligne n'est retournée <> pas d'utilisateur avec ces ids
            return false;
        }
        return true;
    }
}