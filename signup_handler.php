<?php
session_start();
require_once 'Dao.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function limitLength($data, $min, $max){
        if(strlen($data) < $min || strlen($data) > $max){
            return true;
        }else{
            return false;
        }
    }

    $_SESSION['bad-signup'] = array();

$email = validate($_POST['email']);
$user =  validate($_POST['signup-username']);
$password = validate($_POST['signup-password']);

if(empty($email)){
    $_SESSION['bad-signup'][] = "Email is required";
}if(!preg_match('/\w+@\w+\.[a-z]{3}/',$email)){
    $_SESSION['bad-signup'][] = "Email does not match format";
}if(limitLength($email, 8, 64)){
    $_SESSION['bad-signup'][] = "Invalid length! Email length should be 8~64 ";
}if(empty($user)){
    $_SESSION['bad-signup'][] = "Invalid length! Username is required";
}if(limitLength($user, 5, 32)){
    $_SESSION['bad-signup'][] = "Invalid length! Username length should be 5~32 ";
}if(empty($password)){
    $_SESSION['bad-signup'][] = "Invalid length! Password is required";
}if(limitLength($password, 6, 64)){
    $_SESSION['bad-signup'][] = "Invalid length! Password length should be 6~64 ";
}


$dao = new Dao();
$result1 = $dao->userExist($user);
$result2 = $dao->emailExist($email);
if(!empty($result1)){
    $_SESSION['bad-signup'][] = "username already exist";
}if(!empty($result2)){
    $_SESSION['bad-signup'][] = "Email already exist";
}

if (count($_SESSION['bad-signup']) > 0) {
    $_SESSION['submit_attempt']= $_POST;
    header("Location: loginsignup.php");
    exit();
  }
  unset($_SESSION['submit_attempt']);

    $dao->createUser($email, $user, $password);
    header("Location: loginsignup.php?signup_success=Account created! Please Log in now!");
    exit();
