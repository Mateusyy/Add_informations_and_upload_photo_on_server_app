<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.09.2018
 * Time: 17:55
 */

class Model {
    private $host = "localhost";
    private $db_name = "projecttest";
    private $username = "root";
    private $password = "";
    protected $db;
    public function __construct() {
        try{
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password, $opt);
        }catch(PDOException $e){
            print "Connection error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}