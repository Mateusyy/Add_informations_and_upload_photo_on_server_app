<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.09.2018
 * Time: 15:19
 */

class user extends Model{

    private $login = "admin";
    private $password = "admin";

    public function checkLoginData($data)
    {
        $error = [];
        $myLogin = trim($data['login']);
        $myPassword = trim($data['pass']);

        if($myLogin == $this->login){
            if($myPassword == $this->password){
                $_SESSION['zalogowany'] = true;
                $_SESSION['login'] = $myLogin;
            }else{
                array_push($error, "Hasło nie prawisłowe");
            }
        }else{
            array_push($error, "Login nie prawidłowy");
        }

        return $error;
    }

    public function loadInformations(){

        $query = "SELECT * FROM simpledata";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $stmt->fetch(PDO::FETCH_ASSOC);

        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($result, $row);
        }

        return $result;
    }
}