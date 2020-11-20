<?php
class Dao {

    private $host = "us-cdbr-east-02.cleardb.com";
    private $db = "heroku_b9ac03e16c44415";
    private $db_user = "b2a49fd4defe3e";
    private $db_pass = "56b54dd3";

    public function getConnection() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->db_user,$this->db_pass);
            $stmt=$conn->prepare("SET @@auto_increment_increment=1");
            $stmt->execute();
        } catch (Exception $e){
            echo print_r($e,1);
        }
        return $conn;
    }

    public function createUser($email, $user, $pass){
        $conn=$this->getConnection();
        $saveInput = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password);";
		$stmt=$conn->prepare($saveInput);
		$stmt->bindParam(":username", $user);
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":password", $pass);
		$stmt->execute();
    }
    
    public function getUser(){
        try{
        $conn = $this->getConnection();
        echo print_r($conn,1);
        $stmt=$conn->prepare("SELECT * FROM user");
        $stmt ->execute();
        $rows = $stmt->fetchAll();
        return reset($rows);
    }catch(Exception $e){
        echo print_r($e,1);
        exit;
        }
    }

    public function getUserID($user){
        $conn=$this->getConnection();
        $stmt=$conn->prepare("SELECT userID FROM user WHERE username=:username");
        $stmt->bindParam(":username", $user);
        $stmt ->execute();
        $retUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retUser['userID'];
    }

    public function checkUser($user, $pass){
        $conn=$this->getConnection();
        $stmt=$conn->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":password", $pass);
        $stmt ->execute();
        $retUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retUser;
    }

    public function userExist($user){
        $conn=$this->getConnection();
        $stmt=$conn->prepare("SELECT * FROM user WHERE username=:username");
        $stmt->bindParam(":username", $user);
        $stmt ->execute();
        $retUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retUser;
    }
    
    public function emailExist($email){
        $conn=$this->getConnection();
        $stmt=$conn->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt ->execute();
        $retUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retUser;
    }

    

    public function checkLevel($user){
        $conn=$this->getConnection();
        $stmt=$conn->prepare("SELECT level FROM user WHERE username=:username");
        $stmt->bindParam(":username", $user);
        $stmt ->execute();
        $retUser = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retUser;
    }





}