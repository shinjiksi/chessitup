<?php
session_start();
require_once 'Dao.php';


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }function limitLength($data, $min, $max){
        if(strlen($data) < $min || strlen($data) > $max){
            return true;
        }else{
            return false;
        }
    }

    $_SESSION['bad-login'] = array();

$user =  validate($_POST['login-username']);
$password = validate($_POST['login-password']);
if(empty($user)){
    $_SESSION['bad-login'][] = "User Name is required";
}if(limitLength($user, 5, 32)){
    $_SESSION['bad-login'][] = "Username length should be 5~32 characters";
}if(empty($password)){
    $_SESSION['bad-login'][] = "Password is required";
}if(limitLength($password, 6, 64)){
    $_SESSION['bad-login'][] = "Password length should be 6~64 characters";
}


$dao = new Dao();
$result = $dao->checkUser($user, $password);
$level = $dao->checkLevel($user);
$user_id = $dao->getUserID($user);
if(empty($result)){
    $_SESSION['bad-login'][] = "User not found or username/password incorrect";
}

if (count($_SESSION['bad-login']) > 0) {
    $_SESSION['login_attempt']= $_POST;
    header("Location: loginsignup.php");
    exit();
  }
  unset($_SESSION['login_attempt']);

  //Login success
    $_SESSION['username'] = $user;
    $_SESSION['level'] = $level;
    $_SESSION['user_id'] = $user_id;
    header("Location: home.php");
    exit();

